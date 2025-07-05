<h2>Edit Reminder</h2>
<form method="POST" action="/notes/update/<?= $note->id ?>">
    <label>Subject</label><br>
    <input type="text" name="subject" value="<?= htmlspecialchars($note->subject) ?>" required><br>

    <label>Body</label><br>
    <textarea name="body"><?= htmlspecialchars($note->body) ?></textarea><br>

    <label>Completed?</label>
    <input type="checkbox" name="completed" <?= $note->completed ? 'checked' : '' ?>><br>

    <button type="submit">Update</button>
</form>
