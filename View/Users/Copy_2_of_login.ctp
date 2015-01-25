<?php
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
                echo  "找到加密锁。";
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
            echo "已成功返回锁的ID号:" . Hex($ID1) . "--" . Hex($ID2);
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
            $mylen = 6;
            $outstring = $s_simnew1->YReadString(0, $mylen, "ffffffff", "ffffffff", $DevicePath);
            If ($s_simnew1->LastError != 0 ) 
            	echo "读储存器错误";
            else
            	echo "已成功读出字符串：" . $outstring;
        }
        
         //写入字符串到加密锁中
        if($OPCode==8  )
        {
            $nlen = $s_simnew1->YWriteString("加密锁", 0, "ffffffff", "ffffffff", $DevicePath);
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
<div id="content" class="login">
	<div class="inner cf">
		<div class="loginbox">
			<h2 class="title">汽车工程学院考试系统登录</h2>
            <span class="error_info"><?php echo $this->Session->flash(); ?></span>
			<form method="post" action="/users/login" class="loginform">
				<div class="mb10"><label for="account" class="input_label">账号:</label><input id="account" type="text" class="input_text" maxlength="32" name="data[User][account]"></div>
				<div class="mb10"><label for="password" class="input_label">密码:</label><input id="password" type="password" class="input_text" maxlength="32" name="data[User][password]"></div>
				<div class="mb10 cf">
					<label class="input_radio"><input type="radio" checked="checked" name="data[User][role]" value="学生">学生</label>
					<label class="input_radio"><input type="radio" name="data[User][role]" value="教师">教师</label>
					<label class="input_radio"><input type="radio" name="data[User][role]" value="管理员">管理员</label>
				</div>
				<a href="##" class="btn1 submitForm">登录</a>
			</form>
		</div>
	</div>
	<script>
		$(document).ready(function(e) {
			$(window).resize(function(e) {
				$('.loginbox').css('margin-top',($('#content').height()-$('.loginbox').height())/3+'px');
			}).resize();
		});
	</script>
	<script>
	var digitArray = new Array('0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f');
	var xx;
	function toHex( n ) {

	        var result = ''
	        var start = true;

	        for ( var i=32; i>0; ) {
	                i -= 4;
	                var digit = ( n >> i ) & 0xf;

	                if (!start || digit != 0) {
	                        start = false;
	                        result += digitArray[digit];
	                }
	        }

	        return ( result == '' ? '0' : result );
	}

	function getVisiable() 
	{
	   	var DevicePath,ret,n,mylen;
		try
		{
				//建立操作我们的锁的控件对象，用于操作我们的锁
	            var aObject = new ActiveXObject("Syunew3A.s_simnew3");
	            
	            //查找是否存在锁,这里使用了FindPort函数
				DevicePath = aObject.FindPort(0);
				if( aObject.LastError!= 0 )
				{
					//window.alert ( "没有找到密钥，请先插入密钥");
					//window.location.href="err.html";
					return ;
				}
				
				 //'读取锁的唯一ID
	            login.KeyID.value=toHex(aObject.GetID_1(DevicePath))+toHex(aObject.GetID_2(DevicePath));
	            if( aObject.LastError!= 0 )
				{
		            //window.alert( "Err to GetID,ErrCode is:"+aObject.LastError.toString());
			        return ;
				}

				//这里返回对随机数的HASH结果
				login.return_EncData.value=aObject.EncString(login.rnd.value,DevicePath);
				
				if( aObject.LastError!= 0 )
				{
						//window.alert( "Err to StrEnc,ErrCode is:"+aObject.LastError.toString());
						return ;
				}
			}
		catch (e) 
		{
			alert(e.name + ": " + e.message);
		}
	}

	function getKeyID()
	{
	    var DevicePath,ret,n,mylen; 
		try
		{
		    var DevicePath,ret,n,mylen;
				//建立操作我们的锁的控件对象，用于操作我们的锁
	            var aObject = new ActiveXObject("Syunew3A.s_simnew3");
	            
	            //查找是否存在锁,这里使用了FindPort函数
				DevicePath = aObject.FindPort(0);
				if( aObject.LastError!= 0 )
				{
					window.alert ( "请先插入加密锁");
					//window.location.href="err.html";
					return ;
				}
				
				 //'读取锁的唯一ID
	            login.KeyID.value=toHex(aObject.GetID_1(DevicePath))+toHex(aObject.GetID_2(DevicePath));
	            if( aObject.LastError!= 0 )
				{
		            window.alert( "读取ID失败");
			        return ;
				}
	    }
		catch (e) 
		{
			alert(e.name + ": " + e.message);
		}
	}

	function setPWD()
	{
	    var DevicePath,ret,n,mylen; 
	    try 
		{
		        var DevicePath,ret,n,mylen;
				//建立操作我们的锁的控件对象，用于操作我们的锁
	            var aObject = new ActiveXObject("Syunew3A.s_simnew3");
	            
	            //查找是否存在锁,这里使用了FindPort函数
				DevicePath = aObject.FindPort(0);
				if( aObject.LastError!= 0 )
				{
					window.alert ( "没有找到加密锁");
					//window.location.href="err.html";
					return false ;
				}

				aObject.SetCal_2(login.newkey.value, DevicePath)
				if( aObject.LastError!= 0 )
				{
				    alert("密钥设置失败");
				    return false;
				}
				//serUrl("www.baidu.com");
				return true;
	    }
		catch (e) 
		{
			alert(e.name + ": " + e.message);
			return false;
		}
	}

	function bindDongle()
	{
	    if(!window.confirm('确定为该用户绑定加密锁?'))
	    {
	        return false;
	    }
	    if (login.KeyID.value == "" || login.newkey.value == "")
	    {
	        alert("加密锁ID,密钥不能为空");
	        return false;
	    }
	    return setPWD();
	}

	function changeDongle()
	{
	    if(!window.confirm('确定更换该用户加密锁?'))
	    {
	        return false;
	    }
	    if (login.KeyID.value == "" || login.newkey.value == "")
	    {
	        alert("加密锁ID,密钥不能为空");
	        return false;
	    }
	    return setPWD();
	}

	function getParams() 
	{
	   	var DevicePath,ret,n,mylen;
		try
		{
				//建立操作我们的锁的控件对象，用于操作我们的锁
				
				
	            var aObject = new ActiveXObject("Syunew3A.s_simnew3");
	            
	            //查找是否存在锁,这里使用了FindPort函数
				DevicePath = aObject.FindPort(0);
				if( aObject.LastError!= 0 )
				{
					//window.alert ( "没有找到密钥，请先插入密钥");
					//window.location.href="err.html";
					return ;
				}
				
	            //'读取锁的唯一ID
	            //SetCookie("keyid",toHex(aObject.GetID_1(DevicePath))+toHex(aObject.GetID_2(DevicePath)),null,null,null,false);
	            login.KeyID.value = toHex(aObject.GetID_1(DevicePath))+toHex(aObject.GetID_2(DevicePath));
	            if( aObject.LastError!= 0 )
				{
			        return ;
				}
				var rnd = parseInt( Math.random()*2147483646+0);
	            login.rnd.value = rnd
	            
	            //SetCookie("rnd",rnd,null,null,null,false);
	            
				//这里返回对随机数的HASH结果
				SetCookie("returndata",aObject.EncString(rnd,DevicePath),null,null,null,false);
				if( aObject.LastError!= 0 )
				{
						return ;
				}
			}
		catch (e) 
		{
			alert(e.name + ": " + e.message);
		}
	}


	function SetCookie(name,value,expires,path,domain,secure)
	{
	    var expDays = expires*24*60*60*1000;
	    var expDate = new Date();
	    expDate.setTime(expDate.getTime()+expDays);
	    var expString = ((expires==null) ? "" : (";expires="+expDate.toGMTString()))
	    var pathString = ((path==null) ? "" : (";path="+path))
	    var domainString = ((domain==null) ? "" : (";domain="+domain))
	    var secureString = ((secure==true) ? ";secure" : "" )
	    document.cookie = name + "=" + value + expString + pathString + domainString + secureString;
	} 

	function setParams() 
	{
	    var DevicePath, ret, n, mylen;

		try
		{
				//建立操作我们的锁的控件对象，用于操作我们的锁
	            var aObject = new ActiveXObject("Syunew3A.s_simnew3");
	            
	            //查找是否存在锁,这里使用了FindPort函数
				DevicePath = aObject.FindPort(0);
				if( aObject.LastError!= 0 )
				{
					return "未找到加密锁";
				}
				
	            //'读取锁的唯一ID
	            login.KeyID.value=toHex(aObject.GetID_1(DevicePath))+toHex(aObject.GetID_2(DevicePath));
	            if( aObject.LastError!= 0 )
				{
			        return "加密锁ID返回错误";
				}
				
				
			}
		catch (e) 
		{
		    //alert(e.name + ": " + e.message);
			return "加密锁读取失败";
		}
	}

	//function setUrl(var url) 
	//{
//	    var STARTPOS=320	
//	    var VERFCODELEN= 8
//	    var ISLOGONFLAG =1
//	    var WEBPOS=(STARTPOS+VERFCODELEN+ISLOGONFLAG)
//	    try
//		{
//	        var DevicePath,mylen,ret;
//	        var s_simnew1 = new ActiveXObject("Syunew3A.s_simnew3");
//			var VerfCode = new Array(0x57,0x65,0x62,0x4c,0x4f,0x4e,0x36,0x41);
//		    var IsLogon,b_len;
//			var ret;
//			DevicePath = s_simnew1.FindPort(1);//查找加密锁
//			if( s_simnew1.LastError== 0 )
//			{
//			    window.alert ( "系统中存在有两个以上的加密锁，请只插入要设置的加密锁后再进行操作。");
//				return false;
//	        }
//			DevicePath = s_simnew1.FindPort(0);//查找加密锁
//			
//			if( s_simnew1.LastError!= 0 )
//			{
//			    window.alert ( "没有找到加密锁，请插入加密锁后再进行操作。");
//				return false;
//	        }
//		    for(n=0;n<8;n++)
//		    {
//		        s_simnew1.SetBuf( VerfCode[n], n);
//		    }
//			ret=s_simnew1.YWriteEx(STARTPOS,VERFCODELEN, "FFFFFFFF","FFFFFFFF",DevicePath);
//			if(ret!=0)
//			{
//			    window.alert("写入加密锁错误，可能是写密码不正确。");
//	            return false;
//			}
//			s_simnew1.SetBuf( 1, 0);
//			ret=s_simnew1.YWriteEx(STARTPOS+VERFCODELEN,ISLOGONFLAG, "FFFFFFFF","FFFFFFFF",DevicePath);
//			if(ret!=0)
//			{
//	            window.alert("写入加密锁错误，可能是写密码不正确。");
//				return false;
//	        }
//	        len=s_simnew1.YWriteString(url,STARTPOS+VERFCODELEN+ISLOGONFLAG+1, "FFFFFFFF","FFFFFFFF",DevicePath);
//			if(len<0)
//			{
//			    window.alert("写入加密锁错误，可能是写密码不正确。");
//	            return false;
//			}   
//			if(len>100)
//			{
//				window.alert("输入的网址不能大于100个字符，请重新输入。");
//				return false;
//			}
//			s_simnew1.SetBuf(len, 0);
//			ret=s_simnew1.YWriteEx(STARTPOS+VERFCODELEN+ISLOGONFLAG,1, "FFFFFFFF","FFFFFFFF",DevicePath);
	//	
//			if(ret!=0)
//			{
//				window.alert("写入加密锁错误，可能是写密码不正确。");
//				return false;
//			}			
//			window.alert ( "写入成功");
//		}
//		catch(err)
//		{  
//	        txt="错误,原因是" + err.description + "\n\n"  
//	        txt+="请检查是否安装驱动程序"
//	        alert(txt)
//	        return false;
//		}
	//}

	</script>
	
</div>
<?php  }?>