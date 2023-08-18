<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Channel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<h1>Add channel</h1>

<form action="{{ route('channels.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Channel Name</label>
        <input type="text" name="ChannelName" id="channelName" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="name">Description</label>
        <input type="text" name="Description" id="description" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="address">Subscribers Count</label>
        <input type="text" name="SubscribersCount" id="subscribersCount" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="salary">URL</label>
        <input type="text" name="URL" id="URL" class="form-control" required>
    </div>


    <button type="submit" class="btn btn-primary">Add Channel</button>
    <a href="{{ route('channels.index') }}" class="btn btn-secondary">Cancel</a>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>