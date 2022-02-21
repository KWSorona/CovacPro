<?php
	class Smtp {
    var $host;
    var $fp;
    var $lastmsg;
    var $parts;
    var $debug;
    var $charset;
    var $ctype;
    var $BCC;
    var $CC;
    function Smtp($host="localhost") {
        $this->host = $host;
        $this->parts = array();
        $$this->debug = 0;
        $this->charset = "euc-kr";
        $this->ctype = "text/html";
    }
    // 디버그 모드 : 1
    function debug($n=0) {
        $this->debug = $n;
    }
    // smtp 통신을 한다.
    function dialogue($code, $cmd) {
        fputs($this->fp, $cmd."\r\n");
        $line = fgets($this->fp, 1024);
        ereg("^([0-9]+).(.*)$", $line, &$data);
        $this->lastmsg = $data[0];
        if($this->debug) {
           echo htmlspecialchars($cmd)."
".$this->lastmsg."
";
            flush();
        }
        if($data[1] != $code) return false;
        return true;
    }
    //  smptp 서버에 접속을 한다.
    function connect($host='') {
        if($this->debug) {
            echo "SMTP($host) Connecting...
";
            flush();
        }
        if(!$host) $host = $this->host;
        if(!$this->fp = fsockopen($host, 465, $errno, $errstr, 10)) {
            $this->lastmsg = "SMTP($host) 서버접속에 실패했습니다.[$errno:$errstr]";
            return false;
        }
        $line = fgets($this->fp, 1024);
        ereg("^([0-9]+).(.*)$", $line, &$data);
        $this->lastmsg = $data[0];
        if($data[1] != "220") return false;
        if($this->debug) {
            echo $this->lastmsg."
";
            flush();
        }
        $this->dialogue(250, "HELO phpmail");
        return true;
    }
    // stmp 서버와의 접속을 끊는다.
    function close() {
        $this->dialogue(221, "QUIT");
        fclose($this->fp);
        return true;
    }
    // 메시지를 보낸다.
    function smtp_send($email, $from, $data) {
        if(!$mail_from = $this->get_email($from)) return false;
        if(!$rcpt_to = $this->get_email($email)) return false;
        $id = "";  //id  기입
        $pwd = ""; //암호기입
        if(!$this->dialogue(334, "AUTH LOGIN"))  return false;
        if(!$this->dialogue(334, base64_encode($id)))  return false;
        if(!$this->dialogue(235, base64_encode($pwd)))  return false;
#          if(!$this->dialogue(250, "AUTH LOGIN\n")) return false;
#       if(!$this->dialogue(250, base64_encode($id)."\n")) return false;
#        if(!$this->dialogue(250, base64_encode($pwd)."\n")) return false;
        if(!$this->dialogue(250, "MAIL FROM:$mail_from")) return false;
        if(!$this->dialogue(250, "RCPT TO:$rcpt_to")) {
            $this->dialogue(250, "RCPT TO:");
            $this->dialogue(354, "DATA");  
            $this->dialogue(250, ".");
            return false;
        }
        //$this->dialogue(250, "RCPT TO:받는메일주소@받는메일도메인.com");
        $this->dialogue(354, "DATA");
        $mime = "Message-ID: <".$this->get_message_id().">\r\n";
        $mime .= "From: $from\r\n";
        $mime .= "To: $email\r\n";
        /*
        if($this->CC) $mime .= "Cc: ".$this->CC."\r\n";
        if($this->BCC) $mime .= "Bcc: ".$this->BCC."\r\n";
        */
        fputs($this->fp, $mime);
        fputs($this->fp, $data);
        $this->dialogue(250, ".");
    }
    // Message ID 를 얻는다.
    function get_message_id() {
        $id = date("YmdHis",time());
        mt_srand((float) microtime() * 1000000);
        $randval = mt_rand();
        $id .= $randval."@phpmail";
        return $id;
    }
    // Boundary 값을 얻는다.
    function get_boundary() {
        $uniqchr = uniqid(time());
        $one = strtoupper($uniqchr[0]);
        $two = strtoupper(substr($uniqchr,0,8));
        $three = strtoupper(substr(strrev($uniqchr),0,8));
        return "----=_NextPart_000_000${one}_${two}.${three}";
    }
    // 첨부파일이 있을 경우 이 함수를 이용해 파일을 첨부한다.
    function attach($path, $name="", $ctype="application/octet-stream") {
        if(is_file($path)) {
            $fp = fopen($path, "r");
            $message = fread($fp, filesize($path));
            fclose($fp);
            $this->parts[] = array ("ctype" => $ctype, "message" => $message, "name" => $name);
        } else return false;
    }
    // Multipart 메시지를 생성시킨다.
    function build_message($part) {
        $msg .= "Content-Type: ".$part['ctype'];
        if($part['name']) $msg .= "; name=\"".$part['name']."\"";
        $msg .= "\r\nContent-Transfer-Encoding: base64\r\n";
        $msg .= "Content-Disposition: attachment; filename=\"".$part['name']."\"\r\n\r\n";
        $msg .= chunk_split(base64_encode($part['message']));
        return $msg;
    }
    // SMTP에 보낼 DATA를 생성시킨다.
    function build_data($subject, $body) {
        $boundary = $this->get_boundary();
        $attcnt = count($this->parts);
        $mime .= "Subject: $subject\r\n";
        $mime .= "Date: ".date ("D, j M Y H:i:s T",time())."\r\n";
        $mime .= "MIME-Version: 1.0\r\n";
        if($attcnt > 0) {
            $mime .= "Content-Type: multipart/mixed; boundary=\"".$boundary."\"\r\n\r\n".
                "This is a multi-part message in MIME format.\r\n\r\n";
            $mime .= "--".$boundary."\r\n";
        }
        $mime .= "Content-Type: ".$this->ctype."; charset=\"".$this->charset."\"\r\n".
            "Content-Transfer-Encoding: base64\r\n\r\n" . chunk_split(base64_encode($body));
        
        if($attcnt > 0) {
            $mime .= "\r\n\r\n--".$boundary;
            for($i=0; $i<$attcnt; $i++) {
                $mime .= "\r\n".$this->build_message($this->parts[$i])."\r\n\r\n--".$boundary;
            }
            $mime .= "--\r\n";
        }
        return $mime;
    }
    // MX 값을 찾는다.
    function get_mx_server($email) {
        
        if(!ereg("([\._0-9a-zA-Z-]+)@([0-9a-zA-Z-]+\.[a-zA-Z\.]+)", $email, $reg)) return false;
        getmxrr($reg[2], $host);
        if(!$host) $host[0] = $reg[2];
        return $host;
    }
    // 이메일의 형식이 맞는지 체크한다.
    function get_email($email) {
        if(!ereg("([\._0-9a-zA-Z-]+)@([0-9a-zA-Z-]+\.[a-zA-Z\.]+)", $email, $reg)) return false;
        return "<".$reg[0].">";
    }
    //대용량 발송을 위한 함수.
    function send($to, $from, $subject, $body) {
        $data = $this->build_data($subject, $body);
        return $this->smtp_send($to, $from, $data);
    }
    // 메일을 전송한다.
    function sendmail($to, $from, $subject, $body, $type=1) {
        
        if($type == 0) $this->ctype = "text/plain";
        if(!is_array($to)) $to = split("[,;]",$to);
        $data = $this->build_data($subject, $body);
        if($this->host == "auto") {
            foreach($to as $email) {
                if($host = $this->get_mx_server($email)) {
                    for($i=0, $max=count($host); $i<$max; $i++) {
                        if($conn = $this->connect($host[$i])) break;
                    }
                    if($conn) {
                        $this->smtp_send($email, $from, $data);
                        $this->close();
                    }
                }
            }
        } else {
            $this->connect($this->host);
            foreach($to as $email) $this->smtp_send($email, $from, $data);
            $this->close();
        }
    }
}
/*
$mail = new Smtp("ssl://smtp.gmail.com");
$mail->debug();
#$mail->sendmail("수신주소 입력", "발신주소 입력", "이 메일은 정상입니다.", "정상적인 메일이니 삭제하지 마십시오.");
*/

?>