<?php
require_once './yigilma/navbar.php';
require_once 'database.php';

$id = $_GET['id'];

$statement = $pdo->prepare("SELECT * FROM oquv WHERE id = ?");
$statement->execute([$id]);
$post = $statement->fetch();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['PUT'])){
    $id = $_POST['post_id'];
    $ismi = $_POST['ismi'];
    $familyasi = $_POST['familyasi'];
    $yoshi = $_POST['yoshi'];
    $Nomer = $_POST['Nomer'];
    $Manzil = $_POST['Manzil'];
    $statement = $pdo->prepare('UPDATE oquv SET ismi = :ismi, familyasi = :familyasi, yoshi = :yoshi, Nomer = :Nomer, Manzil = :Manzil WHERE id = :id');

  $statement->execute([
          'id' => $id,
   'ismi' => $ismi,
    'familyasi' =>   $familyasi,
      'yoshi' => $yoshi,
      'Nomer' => $Nomer,
      'Manzil' => $Manzil,
  ]);
header('Location: ./index.php');
}
?>


<main class="site-main">
    <br>
    <br>
    <div class="container bg-light p-5">

        <form method="POST" action="">
            <input type="hidden" name="PUT">
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <div class="mb-3">
                <label  class="form-label">Ism</label>
                <input type="text" value="<?= $post['ismi'] ?>" name="ismi" class="form-control"  >

            </div>
            <div class="mb-3">
                <label  class="form-label">Familyasi</label>
                <input type="text" value="<?= $post['familyasi'] ?>" name="familyasi" class="form-control"  >
                <div  class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Yoshi</label>
                <input type="number" value="<?= $post['yoshi'] ?>" name="yoshi" class="form-control"  >
                <div  class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nomer</label>
                <input type="number"value="<?= $post['Nomer'] ?>" name="Nomer" class="form-control"  >
                <div  class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label  class="form-label">Manzil</label>
                <input type="text" value="<?= $post['Manzil'] ?>" name="Manzil" class="form-control"  >
                <div  class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>

</main>
<?php

require_once './yigilma/footer.php';
?>
