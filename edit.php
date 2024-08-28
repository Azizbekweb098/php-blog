<?php

require_once './yigilma/navbar.php';
require_once './database.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ismi = $_POST['ismi'];
    $familyasi = $_POST['familyasi'];
    $yoshi = $_POST['yoshi'];
    $Nomer = $_POST['Nomer'];
    $Manzil = $_POST['Manzil'];

    $statement = $pdo->prepare('INSERT INTO oquv (ismi, familyasi, yoshi, Nomer, Manzil) VALUES (:ismi, :familyasi, :yoshi, :Nomer, :Manzil)');

  $statement->execute([
          'ismi' => $ismi,
          'familyasi' => $familyasi,
          'yoshi' => $yoshi,
          'Nomer' => $Nomer,
          'Manzil' => $Manzil,
  ]);
}



?>


<main class="site-main">
    <br>
    <br>
    <div class="container bg-light p-5">

        <form method="POST" action="">
            <div class="mb-3">
                <label  class="form-label">Ism</label>
                <input type="text" name="ismi" class="form-control"  >

            </div>
            <div class="mb-3">
                <label  class="form-label">Familyasi</label>
                <input type="text" name="familyasi" class="form-control"  >
                <div  class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Yoshi</label>
                <input type="number" name="yoshi" class="form-control"  >
                <div  class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nomer</label>
                <input type="number" name="Nomer" class="form-control"  >
                <div  class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Manzil</label>
                <input type="text" name="Manzil" class="form-control"  >
                <div  class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>

</main>

<?php require_once './yigilma/footer.php';?>
