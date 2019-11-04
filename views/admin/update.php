<?php include ROOT . '/views/layouts/headeradm.php'; ?>
<br> <br> <br>
<section>
    <div class="container">
        <h4>Редактировать задачу #<?php echo $id; ?></h4>
        <br/>
        <form action="#" method="post">
            <textarea class="form-control" name="content"><?php echo $task['content']; ?></textarea>
            <input type="hidden" name="adm_status" value="отредактировано администратором"/>
            <input id="complete" type="checkbox" name="status" value="Задача выполнена">
            <label for="complete">Задача выполнена</label>
            <br><br>
            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Сохранить">
            <br/><br/>
        </form>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>

