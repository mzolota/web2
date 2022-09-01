<?php include 'inc/header.php' ?>

<section class="Onama">
<br>
<br>

<p><span>&#10003;</span>Jedini fitness centar koji radi od 0-24</p>
<p><span>&#10003;</span>Najopremljeniji centar u gradu po pristupačnoj cijeni</p>
<p><span>&#10003;</span>Privatni treneri koji će ti pomoći da se ufuraš!</p>
<p><span>&#10003;</span>Najbolja teretana u gradu </p>


<p>Prijavi se ili registriraj  kako bi znao više :) </p>
<p><span><button class="button" onclick="document.location='login.php'"><b>Ovdje</b></button> </span></p>
<p>Adresa:Vukovarska 2b , Osijek</p>
<p>Kontakt: 031 355 532</p>

</section>

<?php 
class cijenik {
    public $naziv;
    public $cijena;
    public $opis;
    function __construct($naziv,$cijena,$opis) {
        $this->naziv = $naziv;
        $this->cijena = $cijena;
        $this->opis = $opis;
      }
      function getNaziv() {
        return $this->naziv;
      }
      function getOpis() {
        return $this->opis;
      }
      function getCijena() {
        return $this->cijena;
      }
      function setNaziv($naziv) {
        $this->naziv=naziv;
      }
      function setCijena($cijena) {
        $this->naziv=cijena;
      }
      function setOpis($opis) {
        $this->opis=opis;
      }
}
$mjesecna = new cijenik("mjesečna",250,"30 dana neograničenog treninga , u bilo kojem od naših fitness centar-a!");
$pgodine = new cijenik("6 mjeseci",1500,"6 mjeseci neograničenog treninga , u bilo kojem od naših fitness centar-a!");
$godisnja = new cijenik("godišnja",3000,"12 mjeseci neograničenog treninga , u bilo kojem od naših fitness centar-a!");
$studentska = new cijenik("studentska",1500*0.80,"6 mjeseci neograničenog treninga , u bilo kojem od naših fitness centar-a!");
$umirovljenicka = new cijenik("umirovljenicka",1500*0.80,"12 mjeseci neograničenog treninga , u bilo kojem od naših fitness centar-a!");
$ultimate = new cijenik("ultimate",5800,"12 mjeseci neograničenog treninga , u bilo kojem od naših fitness centar-a,4 privatna treninga s jednim od naših trenera , poklon majica !");
$clanarine = array($mjesecna, $pgodine,$godisnja,$studentska,$umirovljenicka,$ultimate);
?>


<section class="Clanstvo" id="Clanstvo">
<div class="wrapper">
        <div class="title">
            <h4><span>Postani dio Fitness4Life kluba</span>Članarine</h4>
        </div>
        <div class="menu">
            <?php foreach ($clanarine as $clanarine): ?>
            <div class="single-menu">
                <img src="slike/logo.jpg" alt="">
                <div class="menu-content">
                    <h4><?php echo $clanarine->naziv; ?> <span><?php echo $clanarine->cijena; ?></span></h4>
                    <p><b><?php echo $clanarine->opis; ?></b></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
          




<?php
class Trener {
    public $ime;
    public $kontakt;
    public $desc;
    public $slika;
    function __construct($ime,$kontakt,$desc,$slika) {
        $this->ime = $ime;
        $this->kontakt = $kontakt;
        $this->desc = $desc;
        $this->slika=$slika;

      }
      function getIme() {
        return $this->ime;
      }
      function getKontakt() {
        return $this->kontakt;
      }
      function getDesc() {
        return $this->desc;
      }
      function getSlika() {
        return $this->slika;
      }
      function setIme($ime) {
        $this->ime=ime;
      }
      function setKontakt($kontakt) {
        $this->kontakt=kontakt;
      }
      function setDesc($desc) {
        $this->desc=desc;
      }
      function setSlika($slika) {
        $this->slika=slika;
      }
}
$marko = new Trener("Marko",9989987811,"Marko je završio kineziologiju u Zagrebu i fitnessom se bavi 5 godina.Uvijek spreman pomoći i dati savijet","slike/marko.jpg");
$ivana = new Trener("Ivana",9583282841,"Ivana se bavi jogom od 15 godine i završila je tečaj nutricionistice u Osijeku , u fitnes industriji je 4 godine","slike/ivana.jpg");
$petar = new Trener("Petar",9235678588,"Petar se se bavi bodybuildingom od svoje 12 godine! Bio je 2. na Europskom prvenstvu u body buildingu i iza sebe ima mnoge godine iskustva","slike/petar.jpg");
$filip = new Trener("Filip",9233688952,"Filip je završio kineziologiju u Osijeku i u profesionalno se bavi bodybuildingom već 8 godina","slike/test.jpg");



?>




<!-- ne moze kroz petlju izbacuje 403 forbidden zbog slike? -->

<section class ="Treneri" id="Treneri">
<section>

<div class="wrapper">
        <div class="title" >
            <h4 style="color:#ffcc00"><span>Najbolji od najboljih</span>Naši treneri</h4>
        </div>
<div class="meni">
        
            <div class="single-meni">
                <img src="slike/marko.jpg"alt="">
                <div class="meni-content">
                    <h4><?php echo $marko->ime; ?> <span><?php echo '0',$marko->kontakt; ?></span></h4>
                    <p><b><?php echo $marko->desc; ?></b></p>
                </div>
            </div>
           
     

    <div class="single-meni">
                <img src="slike/ivana.jpg"alt="">
                <div class="meni-content">
                    <h4><?php echo $ivana->ime; ?> <span><?php echo '0',$ivana->kontakt; ?></span></h4>
                    <p><b><?php echo $ivana->desc; ?></b></p>
                </div>
            </div>
        

    <div class="single-meni">
                <img src="slike/petar.jpg"alt="">
                <div class="meni-content">
                    <h4><?php echo $petar->ime; ?> <span><?php echo '0',$petar->kontakt; ?></span></h4>
                    <p><b><?php echo $petar->desc; ?></b></p>
                </div>
            </div>
        


    <div class="single-meni">
                <img src="slike/test.jpg"alt="">
                <div class="meni-content">
                    <h4><?php echo $filip->ime; ?> <span><?php echo '0',$filip->kontakt; ?></span></h4>
                    <p><b><?php echo $filip->desc; ?></b></p>
                </div>
            </div>
        

    </div>
</div>
    









<?php include 'inc/footer.php'; ?>