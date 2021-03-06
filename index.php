<?php include "html/header.php"; ?>

<div class="main-section">
  <div class="add-section rnd-brdr">
    <form action="app/add.php" method="POST" autocomplete="off">
      <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
        <input type="text" name="title" class="rnd-brdr" placeholder="This field is required!" style="border-color:#ff6666" />
        <button type="submit" class="rnd-brdr">
          Add
          <i class="far fa-plus-square"></i>
        </button>
      <?php } else { ?>
        <input type="text" name="title" class="rnd-brdr" placeholder="Whatcha doing?" />
        <button type="submit" class="rnd-brdr">
          Add
          <i class="far fa-plus-square"></i>
        </button>
      <?php } ?>
    </form>
  </div>

  <?php
  $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
  ?>

  <div class="show-todo-section rnd-brdr">
    <?php if ($todos->rowCount() <= 0) { ?>
      <div class="todo-item rnd-brdr">
        <div class="empty rnd-brdr">
          <img src="img/todo-img.webp" alt="todo">
          <img src="img/dots.gif" alt="dots" id="dots">
        </div>
      </div>
    <?php } ?>

    <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="todo-item rnd-brdr">
        <span id="<?php echo $todo['id']; ?>" class="remove-todo">x</span>
        <?php if ($todo['checked']) { ?>
          <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['id']; ?>" checked>
          <h2 class="checked"><?php echo $todo['title']; ?></h2>
        <?php } else { ?>
          <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['id']; ?>">
          <h2><?php echo $todo['title']; ?></h2>
        <?php } ?>
        <br>
        <small>Created: <?php echo $todo['date_time']; ?></small>
      </div>
    <?php } ?>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.remove-todo').click(function(e) {
      const id = $(this).attr('id');

      $.post("app/remove.php", {
        id: id
      }, data => {
        if (data) {
          $(this).parent().hide(600);
        }
      });
    })

    $('.check-box').click(function(e) {
      const id = $(this).attr('data-todo-id');
      // const checkboxId = '#' + id;

      // if ($(checkboxId).attr('checked')) {
      //   $(checkboxId).removeAttr('checked');
      // } else {
      //   $(checkboxId).attr('checked');
      //   alert(checkboxId);
      // }

      $.post('app/toggle.php', {
        id: id
      }, data => {
        if (data != 'error') {
          const todoH2 = $(this).next();
          if (data === '1') {
            todoH2.removeClass('checked');
          } else {
            todoH2.addClass('checked');
          }
        }
      })
    });
  })
</script>

<?php include "html/footer.php"; ?>
