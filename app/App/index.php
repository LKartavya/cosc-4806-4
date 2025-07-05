<h1>Your Reminders</h1>
<a href="/notes/create">+ Add New Reminder</a>

<?php foreach ($notes as $note): ?>
    <div style="border: 1px solid #ccc; padding: 10px; margin: 10px;">
        <strong><?= htmlspecialchars($note->subject) ?></strong><br>
        <?= nl2br(htmlspecialchars($note->body)) ?><br>
        Status: <?= $note->completed ? '✅ Done' : '⏳ Pending' ?><br>
        <a href="/notes/edit/<?= $note->id ?>">Edit</a> |
        <form method="POST" action="/notes/destroy/<?= $note->id ?>" style="display:inline;">
            <button type="submit">Delete</button>
        </form>
    </div>
<?php endforeach; ?>
