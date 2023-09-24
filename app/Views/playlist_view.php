<!-- playlist_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music Player</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="<?= base_url('js/script.js') ?>" async></script>
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css') ?>">
  <?= $this->include('modals/add_song'); ?>
  <?= $this->include('modals/playlist'); ?>
  <?= $this->include('modals/create_playlist'); ?>
  <?= $this->include('modals/select_from'); ?>


</head>
<body>
<a href="<?= base_url('musicplayer') ?>" class="btn btn-primary">Back to Music Player</a>  
  <h1><?= $playlistName ?></h1>
  <audio id="audio" controls></audio>

  <!-- Back button -->


  <!-- Music list -->
  <ul id="playlist">
    <?php foreach ($songs as $song) : ?>
      <li data-src="<?= base_url($song['ms_path']) ?>">
        <div class="song-container">
          <a href="javascript:void(0);" class="song-title"><?= $song['ms_name'] ?></a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
