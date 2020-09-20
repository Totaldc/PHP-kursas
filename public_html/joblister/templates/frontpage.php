<?php include 'inc/header.php'; ?>
<div class="jumbotron">
    <h1 class="display-3">Find a Job</h1>
    <form method="GET" action="index.php">
        <select name="category" class="form-control">
            <option value="0">Choose Category</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php print $category->id; ?>"><?php print $category->name; ?></option>
            <?php endforeach; ?>
        </select>
        </br>
        <input type="submit" class="btn-lg btn-success" value="FIND">
    </form>
</div>

<?php foreach ($jobs as $job) : ?>
    <div class="row marketing">
        <div class="col-md-10">
            <h4><?php print $job->job_title; ?></h4>
            <p><?php print $job->description; ?></p>
        </div>

        <div class="col-md-2">
            <a class="btn btn-default" href="#">View</a>
        </div>
    </div>
<?php endforeach; ?>

<?php include 'inc/footer.php'; ?>