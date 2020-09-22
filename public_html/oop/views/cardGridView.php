<h2><?= $this->header; ?></h2>
<div class="grid-cruise">
  <?php foreach ($this->cruises as $cruise) $cruise->renderAsCard();?>
</div>