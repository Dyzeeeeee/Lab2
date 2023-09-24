<?= $this->include('modals/create_playlist'); ?>

<!-- Show my playlist -->
<div class="modal fade" id="playlistModal" tabindex="-1" aria-labelledby="playlistModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="playlistModalLabel">List of Playlists</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          <?php foreach ($playlists as $playlist) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div class="list-container">
                <a href="<?= base_url('musicplayer/playlist/' . $playlist['pl_name']) ?>" class="song-title"><?= $playlist['pl_name'] ?></a>
              </div>

              <form action="/musicplayer/delete-playlist/<?= $playlist['pl_id'] ?>" method="post">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
              </form>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="modal-footer">
        <a href="#" data-bs-dismiss="modal">Close</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#createPlaylistModal">Create New</a>
      </div>
    </div>
  </div>
</div>
<!-- Show my playlist -->