<?php


// initializing variables
$username = "root";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', '', '', '');

if(isset($_POST['submit'])) {

$driver = mysqli_real_escape_string($db, $_POST['driver']);

$ns = mysqli_real_escape_string($db, $_POST['ns']);
$yt = mysqli_real_escape_string($db, $_POST['yt']);
$nt = mysqli_real_escape_string($db, $_POST['nt']);
$nu = mysqli_real_escape_string($db, $_POST['nu']);
$bc = mysqli_real_escape_string($db, $_POST['bc']);
$ab = mysqli_real_escape_string($db, $_POST['ab']);
$sk = mysqli_real_escape_string($db, $_POST['sk']);
$mb = mysqli_real_escape_string($db, $_POST['mb']);
$oni = mysqli_real_escape_string($db, $_POST['oni']);
$qc = mysqli_real_escape_string($db, $_POST['qc']);
$nl = mysqli_real_escape_string($db, $_POST['nl']);
$nb = mysqli_real_escape_string($db, $_POST['nb']);
$nh = mysqli_real_escape_string($db, $_POST['nh']);
$vt = mysqli_real_escape_string($db, $_POST['vt']);
$ma = mysqli_real_escape_string($db, $_POST['ma']);
$ri = mysqli_real_escape_string($db, $_POST['ri']);
$ct = mysqli_real_escape_string($db, $_POST['ct']);
$nj = mysqli_real_escape_string($db, $_POST['nj']);
$de = mysqli_real_escape_string($db, $_POST['de']);
$md = mysqli_real_escape_string($db, $_POST['md']);
$wa = mysqli_real_escape_string($db, $_POST['wa']);
$ori = mysqli_real_escape_string($db, $_POST['ori']);
$ca = mysqli_real_escape_string($db, $_POST['ca']);
$id = mysqli_real_escape_string($db, $_POST['id']);
$mt = mysqli_real_escape_string($db, $_POST['mt']);
$nv = mysqli_real_escape_string($db, $_POST['nv']);
$wy = mysqli_real_escape_string($db, $_POST['wy']);
$ut = mysqli_real_escape_string($db, $_POST['ut']);
$az = mysqli_real_escape_string($db, $_POST['az']);
$co = mysqli_real_escape_string($db, $_POST['co']);
$nm = mysqli_real_escape_string($db, $_POST['nm']);
$nd = mysqli_real_escape_string($db, $_POST['nd']);
$ne = mysqli_real_escape_string($db, $_POST['ne']);
$ks = mysqli_real_escape_string($db, $_POST['ks']);
$ok = mysqli_real_escape_string($db, $_POST['ok']);
$tx = mysqli_real_escape_string($db, $_POST['tx']);
$mn = mysqli_real_escape_string($db, $_POST['mn']);
$ia = mysqli_real_escape_string($db, $_POST['ia']);
$mo = mysqli_real_escape_string($db, $_POST['mo']);
$ar = mysqli_real_escape_string($db, $_POST['ar']);
$la = mysqli_real_escape_string($db, $_POST['la']);
$wi = mysqli_real_escape_string($db, $_POST['wi']);
$il = mysqli_real_escape_string($db, $_POST['il']);
$mi = mysqli_real_escape_string($db, $_POST['mi']);
$ini = mysqli_real_escape_string($db, $_POST['ini']);
$ky = mysqli_real_escape_string($db, $_POST['ky']);
$tn = mysqli_real_escape_string($db, $_POST['tn']);
$ms = mysqli_real_escape_string($db, $_POST['ms']);
$al = mysqli_real_escape_string($db, $_POST['al']);
$oh = mysqli_real_escape_string($db, $_POST['oh']);
$ak = mysqli_real_escape_string($db, $_POST['ak']);
$wv = mysqli_real_escape_string($db, $_POST['wv']);
$va = mysqli_real_escape_string($db, $_POST['va']);
$nc = mysqli_real_escape_string($db, $_POST['nc']);
$sc = mysqli_real_escape_string($db, $_POST['sc']);
$ga = mysqli_real_escape_string($db, $_POST['ga']);
$fl = mysqli_real_escape_string($db, $_POST['fl']);
$pa = mysqli_real_escape_string($db, $_POST['pa']);
$ny = mysqli_real_escape_string($db, $_POST['ny']);
$me = mysqli_real_escape_string($db, $_POST['me']);


  	$query = "INSERT INTO exception_states (driver, ns,oni, ini, ori, yt, nt, nu, bc, ab,sk, mb, qc, nl, nb, nh, vt, ma, ri, ct, nj, de, md, wa, ca, id, mt,nv, wy, ut, az, co, nm, nd, ne, ks, ok, tx, mn, ia, mo, ar, la, wi, il, mi, ky, tn, ms, al, oh, ak, wv, va, nc, sc, ga, fl, pa, ny, me) 
  	VALUES('$driver','$ns', '$yt','$nt','$nu','$bc','$ori', '$oni', '$ini', '$ab','$sk','$mb','$qc','$nl','$nb','$nh','$vt','$ma','$ri','$ct','$nj','$de','$md','$wa','$ca','$id','$mt','$nv','$wy','$ut','$az','$co','$nm','$nd','$ne','$ks','$ok','$tx','$mn','$ia','$mo','$ar','$la','$wi','$il','$mi','$ky','$tn','$ms','$al','$oh','$ak','$wv','$va','$nc','$sc','$ga','$fl','$pa','$ny','$me')
  	ON DUPLICATE KEY UPDATE
  	
  	ns = '$ns',
  	yt = '$yt',
  	nt = '$nt',
  	nu = '$nu',
  	bc =  '$bc',
  	ori = '$ori',
  	oni = '$oni',
  	ini = '$ini',
  	ab = '$ab',
  	sk = '$sk',
  	mb = '$mb',
  	qc = '$qc',
  	nl = '$nl',
  	nb = '$nb',
  	nh = '$nh',
  	vt = '$vt',
  	ma = '$ma',
  	ri = '$ri',
  	ct = '$ct',
  	nj = '$nj',
  	de = '$de',
  	md = '$md',
  	wa = '$wa',
  	ca = '$ca',
  	id = '$id',
  	mt = '$mt',
  	nv = '$nv',
  	wy = '$wy',
  	ut = '$ut',
  	az = '$az',
  	co = '$co',
  	nm = '$nm',
  	nd = '$nd',
  	ne = '$ne',
  	ks = '$ks',
  	ok = '$ok',
  	tx = '$tx',
  	mn = '$mn',
  	ia = '$ia',
  	mo = '$mo',
  	ar = '$ar',
  	la = '$la',
  	wi = '$wi',
  	il = '$il',
  	mi = '$mi',
  	ky = '$ky',
  	tn = '$tn',
  	ms = '$ms',
  	al = '$al',
  	oh = '$oh',
  	ak = '$ak',
  	wv = '$wv',
  	va = '$va',
  	nc = '$nc',
  	sc = '$sc',
  	ga = '$ga',
  	fl = '$fl',
  	pa = '$pa',
  	ny = '$ny',
  	me = '$me'
  	";
  	mysqli_query($db, $query);
  	echo "success";
  }

?>