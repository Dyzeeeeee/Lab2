<!-- Modal for creating a new playlist and selecting songs as checkboxes -->
<div class="modal fade" id="createPlaylistModal" tabindex="-1" aria-labelledby="createPlaylistModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="createPlaylistModalLabel">Create New Playlist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form action="/musicplayer/create-playlist" method="post">
          <div class="mb-3">
            <label for="playlistName" class="form-label">Playlist Name</label>
            <input type="text" class="form-control" id="playlistName" name="playlistName" required>
          </div>
          <div class="mb-3">
            <label class="form-label"><b>Select Songs to Add</b></label>
            <?php foreach ($songs as $song) : ?>
              <div class="form-check" id="song_<?= $song['ms_id'] ?>" style="cursor: pointer; transition: background-color 0.3s;" onclick="toggleSongSelection('song_<?= $song['ms_id'] ?>')">
                <input class="form-check-input" type="checkbox" style="display: none;" name="selectedSongs[]" value="<?= $song['ms_id'] ?>" id="checkbox_<?= $song['ms_id'] ?>">
                <label class="form-check-label" for="checkbox_<?= $song['ms_id'] ?>">
                  <?= $song['ms_name'] ?>
                </label>
              </div>
            <?php endforeach; ?>
          </div>
          <button type="submit" class="btn btn-primary">Create Playlist</button>
        </form>
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Function to toggle the song selection and change background color
  function toggleSongSelection(songId) {
    const formCheck = document.getElementById(songId);
    if (formCheck) {
      const checkbox = formCheck.querySelector('.form-check-input');
      if (checkbox) {
        checkbox.checked = !checkbox.checked;
        formCheck.style.backgroundColor = checkbox.checked ? '#d9edf7' : ''; // Change background color
      }
    }
  }
</script>
