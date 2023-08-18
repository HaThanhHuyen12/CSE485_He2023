<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Fake Tube</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">CHANNELS DETAILS </h1>
        <a href="{{ route('channels.create') }}" class="btn btn-primary mb-5">Add New Channel</a>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <tr>
                <td>Channel ID</td>
                <td>Channel Name</td>
                <td>Description</td>
                <td>Subscribers Count</td>
                <!-- <td>URL</td> -->
                <td>Action</td>
            </tr>
            @foreach($channels as $channel)
            <tr>
                <td>{{$channel->ChannelID}}</td>
                <td>{{$channel->ChannelName}}</td>
                <td>{{$channel->Description}}</td>
                <td>{{$channel->SubscribersCount}}</td>
                <!-- <td>{{$channel->URL}}</td> -->
                <td>
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalId1{{ $channel->ChannelID }}">
                        <i class="bi bi-eye-fill"></i>
                    </button>

                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalId1{{ $channel->ChannelID }}" tabindex="-1"
                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">Channel Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Channel Name: </strong>{{ $channel->ChannelName}}</p>
                                    <p><strong>Description: </strong>{{ $channel->Description }}</p>
                                    <p><strong>Subscribers Count: </strong>{{ $channel->SubscribersCount }}</p>
                                    <p><strong>URL: </strong>{{ $channel->URL }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Optional: Place to the bottom of scripts -->
                    <script>
                    const myModal = new bootstrap.Modal(document.getElementById('modalId1'), options)
                    </script>
                    <a href="{{ route('channels.edit',$channel->ChannelID) }}" class="btn btn-primary"><i
                            class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('channels.destroy',$channel->ChannelID) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <!-- Modal trigger button -->
                        <a href="{{ route('channels.destroy',$channel->ChannelID) }}"
                            onclick="return confirm('Are u sure?')"><button type="submit" class="btn btn-danger"><i
                                    class="bi bi-trash3-fill"></i></button></a>


                        <!-- Optional: Place to the bottom of scripts -->
                        <script>
                        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                        </script>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>