<?php
 header("Content-Type:text/html;charset=utf-8");
function Hex($indata)
{
	$lX8 = $indata & 0x80000000;
	if($lX8)
	{
		$indata=$indata & 0x7fffffff;
	}
	while ($indata>16)
	{
		$temp_1=$indata % 16;
		$indata=$indata /16 ;
		if($temp_1<10)
		   $temp_1=$temp_1+0x30;
		else
		   $temp_1=$temp_1+0x41-10; 
		
		$outstring= chr($temp_1) . $outstring ; 
		   
	}
	$temp_1=$indata;
	if($lX8)$temp_1=$temp_1+8;
	if($temp_1<10)
	   $temp_1=$temp_1+0x30;
	else
	   $temp_1=$temp_1+0x41-10; 
	
	$outstring= chr($temp_1) . $outstring ; 
	
	return $outstring;
		 
}

if (!empty($_POST['OPCode']) )
{
	 $OPCode=$_POST['OPCode'];
	/*以下用于创建我们的加密锁控件*/
	$s_simnew1=new COM("Syunew3A.s_simnew3");

	//这个用于判断系统中是否存在着加密锁。不需要是指定的加密锁,
        $DevicePath = $s_simnew1->FindPort(0);
        if( $s_simnew1->LastError != 0 )
        {
            echo "未找到加密锁,请插入加密锁后，再进行操作。";
        }
 

          //这个用于判断系统中是否存在着加密锁。不需要是指定的加密锁,
         if($OPCode==2  )
         {
            $DevicePath = $s_simnew1->FindPort(0);
            if ($s_simnew1->LastError != 0 )
                echo "未找到加密锁,请插入加密锁后，再进行操作。";
            else
                echo  "成功找到加密锁";
         }
        //用于返回加密狗的ID号，加密狗的ID号由两个长整型组成。
        //提示1：锁ID是每一把都是唯一的，每一把是唯一的，是指每一把锁的ID都不相同
        //提示2: ID唯一是指两个ID转化为16进制字符串后并连接起来后是唯一的
        if($OPCode==3 )
        {
            $ID1 = $s_simnew1->GetID_1($DevicePath);
            If ($s_simnew1->LastError != 0 ) echo "返回ID1错误";
            $ID2 = $s_simnew1->GetID_2($DevicePath);
            If ($s_simnew1->LastError != 0 ) echo "返回ID2错误";
            //echo "已成功返回锁的ID号:" . Hex($ID1) . "--" . Hex($ID2);
            echo "已成功返回锁的ID号:" . $ID1. "--" .$ID2;
        }
        
         ////用于返回加密狗的版本号。
        if($OPCode==4  )
        {
            $version = $s_simnew1->GetVersion($DevicePath);
            If ($s_simnew1->LastError != 0 ) echo "返回版本号错误";
            echo "已成功返回锁的版本号:" . $version;
        }
        
         //从加密锁中读取数据
        $outstring="";
        if($OPCode==7  )
        {
            //注意这里的6是长度，要与写入的字符串的长度相同，写入字符串的长度，可以由YWriteString的返回值来获得
            $mylen = 13;
            $outstring = $s_simnew1->YReadString(0, $mylen, "fffffffff", "fffffffff", $DevicePath);
            If ($s_simnew1->LastError != 0 ) 
            	echo "读储存器错误";
            else
            	echo "已成功读出字符串：" . $outstring;
        }
        
         //写入字符串到加密锁中
        if($OPCode==8  )
        {
            $nlen = $s_simnew1->YWriteString("加密锁", 0, "fffffffff", "fffffffff", $DevicePath);
            if ($nlen < 1 )
            {
                echo "写储存器错误";
            }
            else 
            {
            	echo "写入成功。写入的字符串的长度是：" . $nlen;
            }
        }
        
        //设置增强算法密钥
        //注意：密钥为不超过32个的0-F字符，例如：1234567890ABCDEF1234567890ABCDEF,不足32个字符的，系统会自动在后面补0
        if($OPCode==9  )
        {
            $Key = "1234567890ABCDEF1234567890ABCDEF";
            $ret = $s_simnew1->SetCal_2($Key, $DevicePath);
            If ($ret != 0 ) 
            	echo "设置增强算法密钥错误";
            else
            	echo "已成功设置了增强算法密钥";
        }
        
        //使用增强算法对字符串进行加密
      if($OPCode==10  )
       {
            $outstring = $s_simnew1->EncString("加密锁", $DevicePath);
            If ($s_simnew1->LastError != 0 ) 
            	echo "加密字符串出现错误";
            else
            	echo "已成功对字符串进行加密，加密后的字符串为：" . $outstring;
       }
        //推荐加密方案：生成随机数，让锁做加密运算，同时在程序中端使用代码做同样的加密运算，然后进行比较判断。
        //$outstring = StrEnc("加密锁", "1234567890ABCDEF1234567890ABCDEF");
        //$outstring = StrDec($outstring, "1234567890ABCDEF1234567890ABCDEF");
        
        //使用增强算法对二进制数据进行加密

         if($OPCode==11  )
        {
            for ($n = 0;$n<7;$n++)
            {
                $ret = $s_simnew1->SetEncBuf($n, $n);
                If ($ret != 0 ) echo "设置数据缓冲区时错误";
            }
            $ret = $s_simnew1->Cal($DevicePath);
            If ($ret != 0 ) echo "加密数据时失败";
            for ($n = 0;$n<7;$n++)
            {
                $outbuf[n] = $s_simnew1->GetEncBuf($n);
                If ($s_simnew1->LastError != 0 ) echo "从数据缓冲区获取数据时错误";
           }
               echo "已成功对二进制数据进行了加密" ;
             //推荐加密方案：生成随机数，让锁做加密运算，同时在程序中端使用代码做同样的加密运算，然后进行比较判断。
            //以下是对应的加密代码，可以参考使用  
            
           // $in_b = Array(0,1,2,3,4,5,6,7)
            //for n=0 to 7
            //  SetEncBuf in_b(n),n 
            //next 
            //EnCode "1234567890ABCDEF1234567890ABCDEF"
            //for n=0 to 7
            ////  in_b(n)=GetEncBuf (n) 
            //  SetEncBuf in_b(n),n 
            //next 
            //DeCode "1234567890ABCDEF1234567890ABCDEF" 
        }

}
else
{
?>

<html>
<head>
<title>会员登陆</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<script language="javascript" type="text/javascript" > 

function Button2_onclick() {
    form1.OPCode.value="2"
   form1.submit();
  }
  
function Button3_onclick() {
    form1.OPCode.value="3"
   form1.submit();
}

function Button4_onclick() {
    form1.OPCode.value="4"
   form1.submit();
}

function Button7_onclick() {
    form1.OPCode.value="7"
   form1.submit();
}

function Button8_onclick() {
    form1.OPCode.value="8"
   form1.submit();
}

function Button9_onclick() {
    form1.OPCode.value="9"
   form1.submit();
}

function Button10_onclick() {
    form1.OPCode.value="10"
   form1.submit();
}

function Button11_onclick() {
    form1.OPCode.value="11"
   form1.submit();
}

</script>

<body bgcolor="#FFFFFF">
<h1 align="center">　</h1>
<h1 align="center"><font color="#FF0000">
  </font>&nbsp;</h1>
<hr align="center">
<div align="center">
        <input id="Button2" style="width: 114px; height: 41px" type="button" value="查找加密锁" language="javascript" onclick="return Button2_onclick()" />
    &nbsp; &nbsp;<br />
    <br />
    <input id="Button3" type="button" value="返回锁的ID" style="width: 114px; height: 41px" language="javascript" onclick="return Button3_onclick()"/><input id="Button4" type="button" value="返回锁的版本" style="width: 114px; height: 41px" language="javascript" onclick="return Button4_onclick()"/><br />
    <br />
    <br />
    <input id="Button7" type="button" value="读取字符串" style="width: 114px; height: 41px" language="javascript" onclick="return Button7_onclick()"/>
    <input id="Button8" type="button" value="写字符串" style="width: 114px; height: 41px" language="javascript" onclick="return Button8_onclick()"/><br />
    <br />
    <br>
    <input id="Button9" style="width: 114px; height: 41px" type="button" value="设置增强算法密钥" language="javascript" onclick="return Button9_onclick()" />
    <input id="Button10" style="width: 114px; height: 41px" type="button" value="对字符串进行加密" language="javascript" onclick="return Button10_onclick()" />
    <input id="Button11" style="width: 114px; height: 41px" type="button" value="对二进制数据进行加密" language="javascript" onclick="return Button11_onclick()" /></div>
<form action=testphp.php id=form1 method=post name="testphp" >
  <div align="center">
    <P>
        &nbsp;&nbsp;
        <input id="OPCode"name="OPCode" type="text" />
        <BR>
    <p>&nbsp;</p>
     </div>
</form>
<hr>
<h2 align=center>　</h2>
<h2 align=center>　</h2>
<h2 align=center>　</h2>
</body>
</html>
<?php
}
?>

