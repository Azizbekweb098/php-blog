<?php
require_once './yigilma/navbar.php';

require_once 'database.php';

  $statement = $pdo->prepare('SELECT * FROM oquv');
  $statement->execute();
  $posts = $statement->fetchAll();

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DELETE'])){
      $post_id = $_POST['post_id'];

      $statement = $pdo->prepare('DELETE FROM oquv where id = ?');
      $statement->execute([$post_id]);

  }


?>
<main class="site-main">
    <br>
    <br>
    <br>

    <div class="container bg-light p-5">

        <table class="table table-dark table-striped">
           <a href="./edit.php
"> <buttton class="btn btn-danger">Talaba qoshish</buttton></a>
            <br>
            <br>
            <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Ismi</th>
                <th scope="col">Familyasi</th>
                <th scope="col">yoshi</th>
                <th scope="col">Nomer</th>
                <th scope="col">Manzil</th>


            </tr>
            </thead>
            <?php foreach ($posts as $post): ?>
                <tbody>
                <tr>
                    <th scope="row"><?= $post['id'] ?></th>
                    <td><?= $post['ismi'] ?></td>
                    <td><?= $post['familyasi'] ?></td>
                    <td><?= $post['yoshi'] ?></td>
                    <td><?= $post['Nomer'] ?></td>
                    <td><?= $post['Manzil'] ?></td>
                    <td style="display: flex; gap: 20px">
                        <a href="#" class="btn btn-info">Edit</a>
                        <form method="POST"  action="">
                            <input type="hidden" name="post_id" value="<?= $post['id'] ?>"  >
                            <input type="hidden" name="DELETE" >
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                        <a href="./update.php?id=<?= $post['id'] ?>" class="btn btn-dark">Update</a>

                    </td>
                </tr>

                </tbody>
            <?php endforeach; ?>
        </table>

    </div>
</main>
<?php

require_once './yigilma/footer.php'
?>
