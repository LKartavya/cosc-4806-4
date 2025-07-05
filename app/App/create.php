<h2>Create Reminder</h2>
<form method="POST" action="/notes/store">
    <label>Subject</label><br>
    <input type="text" name="subject" required><br>

    <label>Body</label><br>
    <textarea name="body"></textarea><br>

    <label>Completed?</label>
    <input type="checkbox" name="completed"><br>

    <button type="submit">Save</button>
</form>
