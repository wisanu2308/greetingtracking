<?php 

error_reporting(0);

function utf8_strlen($s) {
    
	$c = strlen($s); 
	$l = 0;
	for ($i = 0; $i < $c; ++$i) {
		if ((ord($s[$i]) & 0xC0) !== 0x80) {
			$l++;
		}
	}
	return $l;

}

$get = $_POST;
$resultTracking = array();

if (isset($get['TrackingName'])) {

	$nameList = array();

	$nameList = [
		'test' => 'ฮั่นแน่~~',
		'จ่วง' => 'อร้ายยยยยยยยย นีนี่~~~~',
		"ธีรวีร์_เตชะวรบท" => "RP657898255TH",
		"สมัชญ์_สมพรมทิพย์" => "RP657898247TH",
		"อนัตต์_สุริวงค์ใย" => "RP657898233TH",
		"พ.ต.หญิง_จิรประภา_จารีรักษ์" => "RP657898220TH",
		"มนสิช_เชาวรรณ" => "RP657898216TH",
		"คุณสราวุธ_พิชนนาค" => "RP657898202TH",
		"กันตยา_ไชยกาล" => "RP657898511TH",
		"ชนินทร์_โล่โชตินันท์" => "RP657898193TH",
		"ธนิสร_อนุกูล" => "RP657898278TH",
		"ญาดา_จินต์สืบพงศ์" => "RP657898264TH",
		"นาย_วสันต์_อินทะขันธ์" => "RP657898180TH",
		"ลลิตา_รัตนรุ่งศรี" => "RP657898600TH",
		"อาทิตยา_พงศ์อายุกูล" => "RP657898595TH",
		"เนติลักษณ์_บุญพรหม" => "RP657898587TH",
		"นาย_กรัณฑพงศ์_อารีรักษ์" => "RP657898560TH",
		"ก้องภพ_เลี้ยงถนอม" => "RP657898556TH",
		"ปณิธาน_กำเนิด" => "RP657898542TH",
		"ลลิตนภัส_ปะสะสุข" => "RP657898539TH",
		"Siriwat_Paknapa" => "RP657898508TH",
		"พีรณัฐ_ติ๊บยาถา" => "RP657898499TH",
		"อภิยุทธ_ชีวเกษมกิจ" => "RP657898485TH",
		"ฐิติรัตน์_ตี่โชติ" => "RP657898525TH",
		"นายชลิต_สุกิจรัตนาภรณ์" => "RP657898471TH",
		"ชนินทร์_จงธนาไพฑูรย์" => "RP657898573TH",
		"นายอัษฎา_เบิกไพร" => "RP657898304TH",
		"รัชศักดิ์_นนทะวงศ์" => "RP657898366TH",
		"มัณฑนา_เปียงต๊ะ_" => "RP657898352TH",
		"ร.ท.หญิง_ปุณยวัจน์_กองสุข" => "RP657898349TH",
		"นายสุภาณุพัฒน์_ทีบุตร" => "RP657898335TH",
		"พงศภัทร" => "RP657898410TH",
		"จิณณวัตร_ผดุงกิจจานนท์" => "RP657898468TH",
		"นาย_ธนพล_ดุกล่อง" => "RP657898454TH",
		"จิตติพล_เปรมมณี" => "RP657898445TH",
		"นาย_กัณลชากร_ผ่องใส" => "RP657898437TH",
		"นายยศพัทธ์_ฦๅชา" => "RP657898321TH",
		"อริญชย์_จิตต์สวัสดิ์" => "RP657898295TH",
		"กตคุณ_กนกนุกุลชัย" => "RP657898176TH",
		"ธีระพงษ์_นากายา" => "RP657898318TH",
		"นายเทพวิทิต_นันทวงศ์" => "RP657898423TH",
		"กิตติ_ธรรมขัน" => "RP657898406TH",
		"ร.อ.หญิง_ธัญญลักษณ์_วงศ์พิมล" => "RP657898397TH",
		"ธนันต์_พีระพัฒนพงษ์" => "RP657898383TH",
		"นายติณณภพ_นกแก้ว" => "RP657898370TH",
		"นายจิรวัฒน์_พิบูลย์ไพร" => "RP657898281TH",
		"นาย_เจษฎา_อรุณปลอด" => "",
		"สัจมน_ปันทา" => "",
		"สิตาพัชญ์_พิชิตพงษ์ไชย" => "",
		"มาริษ_คงหมุน" => "",
		"นายพีระเดช_นวรัตน์_ณ_อยุธยา" => "",
		"ภัทรพล_แก้วสง่า" => "",
		"วิริทธิ์พล_ด้วงวิเศษ" => "",
		"นายนราธิป_ปัญญาอินทร์" => "",
		"ปิยสันต์_พงษ์เพิ่มมาศ" => "",
		"Chittapun_Aramwattananont" => "",
		"สรวิชญ์_มาเนตร" => "",
		"วิกานดา_กีศรี" => "",
		"ปิยะบุตร_รัฐสยาม" => "",
		"อนุรุจน์_ฉิมแฉ่ง" => "",
		"ประสบชัย_แก้วสุจริต" => "",
		"ภัคพงศ์_คำกุล" => "",
		"สมภพ_วัฒนากรแก้ว" => "",
		"นาย_ธนัญชัย_นามมาลี" => "",
		"ปาลิกา_ศิริพงศทัต" => "",
		"เชิด​ศักดิ์​_ปิย​ธรรม​สถิต​" => "",
		"ณัฐพล_อรุณทัต" => "",
		"นราสิริ​_ยงใย" => "",
		"อดิศักดิ์_มั่นเขียว" => "",
		"วิกานดา_กีศรี" => "",
		"Noppawan" => "",
		"ภาธร_พัทมุข" => "",
		"ธาดา_ศิรินนท์ธนเวช" => "",
		"อมร_จาคีไพบูลย์" => "",
		"นาย_นันท์นภัส_คเนจร_ณ_อยุธยา" => "",
		"ณัฐวุฒิ_เฉลิมวงค์" => "",
		"Surachai_j." => "",
		"ณัชค์สพล_ประกอบธรรม" => "",
		"ตะวัน_อังกาบ" => "",
		"นาย_เอกบุรุษ_มีอิ่ม" => "",
		"นายพิทยา_สิทธิอำนวย" => "",
		"นายธนาคาร_พฤกษาชลวิทย์" => "RP657898613TH",
		"ณัชชรีย์_จรัสเเสงศิริพร" => "",
		
		"Pittayawasit_Thongkawkaew" => "",
		"ศรายุทธ_จรัสภิญโญวงศ์" => "",
		"ภูภณ_มณีวงศ์" => "",
		"อันดา_เย็นฉ่ำ" => "",
		"ประสิทธิ์_สุนทรวาณิชย์กิจ" => "",
		"ปุณยธร_สัมฤทธิ์ดี" => "",
		"K._Nonpiya_Niyompong" => "",
		"กันตณัฐ_สว่างแจ้ง" => "",
		"สุรชาติ_นนท์คำวงศ์" => "",
		"กิตตินันท์_ภิรมย์นุกูล" => "",
		"ยศกร_ร่วมชาติสกุล" => "",
		"คุณ_วรรณวณิชย์_กำธรวรรินทร์" => "",
		"พิชญากร_วิเศษกมล" => "",
		"สาธิต_ม่วงศิริ" => "",
		"นายณัฐพล_จันเต" => "",
		"นาย_คณพัฒน์_เย็นเกษม" => "",
		"Panarin_fungcharoen" => "",
		"กิตติคุณ_โชติกเสถียร" => "",
		"ศตวรรษ_ย่องยัง" => "",
		"คุณยู" => "",
		"กรุณา_อดิเรกชยาภรณ์" => "",
		"ภูมีทัตต์_เรืองธรรมศักดิ์" => "",
		"พ.ต.อ._ไพศาล_นันตา" => "",
		
	];

	if(utf8_strlen($get['TrackingName']) >= 3){
		
		foreach ($nameList as $keyName => $valueTracking) {

			$NameWithSpace = str_replace("_", " ", $keyName);
			if (strpos($NameWithSpace, $get['TrackingName']) !== false) {
				$resultTracking[$keyName] = $valueTracking;
			}
		}

	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Kaning Tracking</title>
</head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>

<style>
	.footer {
		position: fixed;
		left: 0;
		bottom: 0;
		width: 100%;
		background-color: #6ac3ae;
		color: #000000;
		text-align: center;
	}
</style>

<body style="width:80%;margin: auto;">

	<h3 class="text-center">❄️🌱 Kaning Tracking 🌱🦊</h3>

	<form action="" method="POST">
		<label> - ค้นหาชื่อ - </label>
		<input class="form-control" style="display:inline-block" type="text" name="TrackingName" value="<?= $get['TrackingName'] ?>">
		<p></p>
		<button class="form-control btn btn-sm btn-success" style="display:inline-block;"><span class="glyphicon glyphicon-search"></span> ค้นหา</button>

	</form>
	
	<?php if (count($_POST) > 0): ?>
		
		<div class="text-center">
			
			<?php if (count($resultTracking) > 0) { ?>

			<br>
			<table class="table table-hover table-condensed" align="center" style="width:100%;">
				<tr>
					<th style="text-align:center;">ชื่อผู้รับ</th>
					<th style="text-align:center;">Tracking</th>
					<th style="text-align:center;">รายละเอียด</th>
				</tr>

				<?php foreach ($resultTracking as $keyName => $valueTracking) : ?>
					<tr>
						<td astyle="text-align:center;"><?= str_replace("_", " ", $keyName); ?></td>
						<td astyle="text-align:center;"><?= $valueTracking; ?></td>

						<?php $link = "https://track.thailandpost.co.th/?trackNumber=".$valueTracking; ?>
						<td astyle="text-align:center;"><a href='<?= $link ?>' class='btn btn-xs btn-info' style='color:white;' target='_blank'> <span class='glyphicon glyphicon-send'></span> รายละเอียด</a></td>
					</tr>
				<?php endforeach; ?>

			</table>

			<?php } else { 
				
					if(utf8_strlen($get['TrackingName']) >= 3){
						echo "<br><h4>ไม่พบข้อมูล กรุณาติดต่อทางเพจ</h4>";
					} else {
						echo "<br><h4>ข้อมูลไม่เพียงพอ กรุณาลองใหม่อีกครั้ง</h4>";
					}	
				}
			?>
		</div>

	<?php endif ?>

	<?php if($get['TrackingName'] === "kaningall"){ ?>

			<br>
			<table class="table table-hover table-condensed" align="center" style="width:100%;">
				<tr>
					<th style="text-align:center;">ชื่อผู้รับ</th>
					<th style="text-align:center;">Tracking</th>
					<th style="text-align:center;">รายละเอียด</th>
				</tr>

				<?php foreach ($nameList as $keyName => $valueTracking): ?>
					<tr>
						<td style="text-align:center;"><?= str_replace("_", " ", $keyName); ?></td>
						<td style="text-align:center;"><?= $valueTracking; ?></td>

						<?php $link = "https://track.thailandpost.co.th/?trackNumber=".$valueTracking; ?>
						<td style="text-align:center;"><a href='<?= $link ?>' class='btn btn-xs btn-info' style='color:white;' target='_blank'> <span class='glyphicon glyphicon-send'></span> รายละเอียด</a></td>
					</tr>
				<?php endforeach; ?>

			</table>
	<?php } ?>

	<br><br><br>

	<div class="footer">
		<p></p>
		<b>Kaning CGM48 Thailand Fanclub</b> <br>
		<a href="https://facebook.com/kaningcgm48thailandfanclub" target="_blank" style="color:#000000"><i class="fa fa-facebook-square"></i> Facebook</a> | 
		<a href="https://twitter.com/kaningcgm48thfc" target="_blank" style="color:#000000"><i class="fa fa-twitter-square"></i> Twitter </a> | 
		<a href="https://www.instagram.com/kaningcgm48thfc/" target="_blank" style="color:#000000"><i class="fa fa-instagram"></i> Instagram</a>
		<p></p>
	</div>

</body>
</html>