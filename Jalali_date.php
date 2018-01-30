<?php

class Jalali_date {
		
	public static function jdate($type,$maket="now")
	{
		//set 1 if you want translate number to farsi or if you don't like set 0
		$transnumber=1;
		///chosse your timezone
		$TZhours=0;
		$TZminute=0;
	
		if($maket=="now"){
			$year=date("Y");
			$month=date("m");
			$day=date("d");
			list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
			$maket=self::jmaketime(date("H")+$TZhours,date("i")+$TZminute,date("s"),$jmonth,$jday,$jyear);
		}else{
			$maket+=$TZhours*3600+$TZminute*60;
			$date=date("Y-m-d",$maket);
			list( $year, $month, $day ) = preg_split ( '/-/', $date );
	
			list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
			}
	
		$need= $maket;
		$year=date("Y",$need);
		$month=date("m",$need);
		$day=date("d",$need);
		$i=0;
		$result = "";
		$result1 = "";
		while($i<strlen($type))
		{
			$subtype=substr($type,$i,1);
			switch ($subtype)
			{
	
				case "A":
					$result1=date("a",$need);
					if($result1=="pm") $result.= "بعدازظهر";
					else $result.="قبل ‏ازظهر";
					break;
	
				case "a":
					$result1=date("a",$need);
					if($result1=="pm") $result.= "ب.ظ";
					else $result.="ق.ظ";
					break;
				case "d":
					list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
					if($jday<10)$result1="0".$jday;
					else 	$result1=$jday;
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "D":
					$result1=date("D",$need);
					if($result1=="Thu") $result1="پنجشنبه";
					else if($result1=="Sat") $result1="شنبه";
					else if($result1=="Sun") $result1="یک شنبه";
					else if($result1=="Mon") $result1="دوشنبه";
					else if($result1=="Tue") $result1="سه شنبه";
					else if($result1=="Wed") $result1="چهارشنبه";
					else if($result1=="Thu") $result1="پنجشنبه";
					else if($result1=="Fri") $result1="جمعه";
					$result.=$result1;
					break;
				case"F":
					list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
					$result.=self::monthname($jmonth);
					break;
				case "g":
					$result1=date("g",$need);
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "G":
					$result1=date("G",$need);
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
					case "h":
					$result1=date("h",$need);
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "H":
					$result1=date("H",$need);
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "i":
					$result1=date("i",$need);
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "j":
					list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
					$result1=$jday;
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "l":
					$result1=date("l",$need);
					if($result1=="Saturday") $result1="شنبه";
					else if($result1=="Sunday") $result1="يكشنبه";
					else if($result1=="Monday") $result1="دوشنبه";
					else if($result1=="Tuesday") $result1="سه شنبه";
					else if($result1=="Wednesday") $result1="چهارشنبه";
					else if($result1=="Thursday") $result1="پنجشنبه";
					else if($result1=="Friday") $result1="جمعه";
					$result.=$result1;
					break;
				case "m":
					list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
					if($jmonth<10) $result1="0".$jmonth;
					else	$result1=$jmonth;
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "M":
					list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
					$result.=self::monthname($jmonth);
					break;
				case "n":
					list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);	
					$result1=$jmonth;
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "s":
					$result1=date("s",$need);
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "S":
					$result.="??";
					break;
				case "t":
					$result.=lastday ($month,$day,$year);
					break;
				case "w":
					$result1=date("w",$need);
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "y":
					list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);	
					$result1=substr($jyear,2,4);
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;
				case "Y":
					list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
					$result1=$jyear;
					if($transnumber==1) $result.=self::Convertnumber2farsi($result1);
					else $result.=$result1;
					break;		
				default:
					$result.=$subtype;
			}
		$i++;
		}
		return $result;
	}
	
	public static function g2j($date)
	{
	list( $year, $month, $day ) = preg_split ( '/-/', $date );
	list( $jy, $jm, $jd ) = self::gregorian_to_jalali($year, $month, $day);
	$date=$jy.'-'.$jm.'-'.$jd;
	return $date;
	}
	
	public static function j2g($date)
	{
	list( $year, $month, $day ) = preg_split ( '/-/', $date );
	list( $gy, $gm, $gd ) = self::jalali_to_gregorian($year, $month, $day);
	$date=$gy.'-'.$gm.'-'.$gd;
	return $date;
	}
	
	public static function jmaketime($hour,$minute,$second,$jmonth,$jday,$jyear)
	{
		list( $year, $month, $day ) = self::jalali_to_gregorian($jyear, $jmonth, $jday);
		$i=mktime($hour,$minute,$second,$month,$day,$year);	
		return $i;
	}
	
	
	///Find Day Begining Of Month
	public static function mstart($month,$day,$year)
	{
		list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
		list( $year, $month, $day ) = self::jalali_to_gregorian($jyear, $jmonth, "1");
		$timestamp=mktime(0,0,0,$month,$day,$year);
		return date("w",$timestamp);
	}
	
	//Find Number Of Days In This Month
	public static function lastday ($month,$day,$year)
	{
		$lastdayen=date("d",mktime(0,0,0,$month+1,0,$year));
		list( $jyear, $jmonth, $jday ) = self::gregorian_to_jalali($year, $month, $day);
		$lastdatep=$jday;
		$jday=$jday2;
		while($jday2!="1")
		{
			if($day<$lastdayen)
			{
				$day++;
				list( $jyear, $jmonth, $jday2 ) = self::gregorian_to_jalali($year, $month, $day);
				if($jdate2=="1") break;
				if($jdate2!="1") $lastdatep++;
			}
			else
			{ 
				$day=0;
				$month++;
				if($month==13) 
				{
						$month="1";
						$year++;
				}
			}
	
		}
		return $lastdatep-1;
	}
	
	//translate number of month to name of month
	public static function monthname($month)
	{
	
	    if($month=="01") return "فروردين";
	
	    if($month=="02") return "ارديبهشت";
	
	    if($month=="03") return "خرداد";
	
	    if($month=="04") return  "تیر";
	
	    if($month=="05") return "مرداد";
	
	    if($month=="06") return "شهریور";
	
	    if($month=="07") return "مهر";
	
	    if($month=="08") return "آبان";
	
	    if($month=="09") return "آذر";
	
	    if($month=="10") return "دی";
	
	    if($month=="11") return "بهمن";
	
	    if($month=="12") return "اسفند";
	}
	
	////here convert to  number in persian
	public static function Convertnumber2farsi($srting) 
	{
		$num0="0";
		$num1="1";
		$num2="2";
		$num3="3";
		$num4="4";
		$num5="5";
		$num6="6";
		$num7="7";
		$num8="8";
		$num9="9";
		
		$stringtemp="";
		$len=strlen($srting);
		for($sub=0;$sub<$len;$sub++)
		{
		 if(substr($srting,$sub,1)=="0")$stringtemp.=$num0;
		 elseif(substr($srting,$sub,1)=="1")$stringtemp.=$num1;
		 elseif(substr($srting,$sub,1)=="2")$stringtemp.=$num2;
		 elseif(substr($srting,$sub,1)=="3")$stringtemp.=$num3;
		 elseif(substr($srting,$sub,1)=="4")$stringtemp.=$num4;
		 elseif(substr($srting,$sub,1)=="5")$stringtemp.=$num5;
		 elseif(substr($srting,$sub,1)=="6")$stringtemp.=$num6;
		 elseif(substr($srting,$sub,1)=="7")$stringtemp.=$num7;
		 elseif(substr($srting,$sub,1)=="8")$stringtemp.=$num8;
		 elseif(substr($srting,$sub,1)=="9")$stringtemp.=$num9;
		 else $stringtemp.=substr($srting,$sub,1);
	
		}
	return   $stringtemp;
	
	}///end conver to number in persian
	
	public static function div($a,$b) {
	    return (int) ($a / $b);
	}
	public static function gregorian_to_jalali ($g_y, $g_m, $g_d) 
	{
	    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
	    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);     
	    
	
	
	   
	
	   $gy = $g_y-1600; 
	   $gm = $g_m-1; 
	   $gd = $g_d-1; 
	
	   $g_day_no = 365*$gy+self::div($gy+3,4)-self::div($gy+99,100)+self::div($gy+399,400); 
	
	   for ($i=0; $i < $gm; ++$i) 
	      $g_day_no += $g_days_in_month[$i]; 
	   if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0))) 
	      /* leap and after Feb */ 
	      $g_day_no++; 
	   $g_day_no += $gd; 
	
	   $j_day_no = $g_day_no-79; 
	
	   $j_np = self::div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */ 
	   $j_day_no = $j_day_no % 12053; 
	
	   $jy = 979+33*$j_np+4*self::div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */ 
	
	   $j_day_no %= 1461; 
	
	   if ($j_day_no >= 366) { 
	      $jy += self::div($j_day_no-1, 365); 
	      $j_day_no = ($j_day_no-1)%365; 
	   } 
	
	   for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i) 
	      $j_day_no -= $j_days_in_month[$i]; 
	   $jm = $i+1; 
	   $jd = $j_day_no+1; 
	
	   return array($jy, $jm, $jd); 
	} 
	
	public static function jalali_to_gregorian($j_y, $j_m, $j_d) 
	{ 
	    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
	    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);
	    
	   
	
	   $jy = $j_y-979; 
	   $jm = $j_m-1; 
	   $jd = $j_d-1; 
	
	   $j_day_no = 365*$jy + self::div($jy, 33)*8 + self::div($jy%33+3, 4); 
	   for ($i=0; $i < $jm; ++$i) 
	      $j_day_no += $j_days_in_month[$i]; 
	
	   $j_day_no += $jd; 
	
	   $g_day_no = $j_day_no+79; 
	
	   $gy = 1600 + 400*self::div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */ 
	   $g_day_no = $g_day_no % 146097; 
	
	   $leap = true; 
	   if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */ 
	   { 
	      $g_day_no--; 
	      $gy += 100*self::div($g_day_no,  36524); /* 36524 = 365*100 + 100/4 - 100/100 */ 
	      $g_day_no = $g_day_no % 36524; 
	
	      if ($g_day_no >= 365) 
	         $g_day_no++; 
	      else 
	         $leap = false; 
	   } 
	
	   $gy += 4*self::div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */ 
	   $g_day_no %= 1461; 
	
	   if ($g_day_no >= 366) { 
	      $leap = false; 
	
	      $g_day_no--; 
	      $gy += self::div($g_day_no, 365); 
	      $g_day_no = $g_day_no % 365; 
	   } 
	
	   for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++) 
	      $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap); 
	   $gm = $i+1; 
	   $gd = $g_day_no+1; 
	
	   return array($gy, $gm, $gd); 
	}
}
