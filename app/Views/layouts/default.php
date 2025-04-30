<?= $this->include("partials/header"); ?>
<?= $this->include("partials/navbar"); ?>
<?= $this->include("partials/sidebar"); ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Blank Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active">Blank</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <?= $this->renderSection("content"); ?>
  </section>

</main><!-- End #main -->
<?= $this->include("partials/footer"); ?>
<?= $this->include("partials/scripts");
