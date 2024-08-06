<div class="modal-content">
    <form id="formAction" action="{{ $price->id ? route('prices.update', $price->id) : route('prices.store') }} "
        method="post">
        @csrf
        @if ($price->id)
            @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">Harga Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name">Halaman Berwarna</label>
                        <input type="text" placeholder="Input price" value="{{ $price->pageBerwarnaPrice }}"
                            class="form-control" id="pageBerwarnaPrice" name="pageBerwarnaPrice">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="guard_name">Halaman Hitam/Putih</label>
                        <input type="number" placeholder="Input price" value="{{ $price->pageHitamPutihPrice }}"
                            class="form-control" id="pageHitamPutihPrice" name="pageHitamPutihPrice">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="guard_name">Harga Hard File</label>
                        <input type="number" placeholder="Input price" value="{{ $price->hardjilidprice }}"
                            class="form-control" id="hardjilidprice" name="hardjilidprice">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="guard_name">Harga Soft File</label>
                        <input type="number" placeholder="Input price" value="{{ $price->softjilidprice }}"
                            class="form-control" id="softjilidprice" name="softjilidprice">
                    </div>
                </div>
            </div>
            <div class="mb-3" id="current-date">
            </div>
            <div class="mb-3" id="current-time">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save price</button>
        </div>
    </form>
</div>

<script>
    // Function to get and display the current time and date
    function displayCurrentTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();
        var day = currentTime.getDate();
        var month = currentTime.getMonth() + 1;
        var year = currentTime.getFullYear();

        // Format the time as HH:MM:SS
        var formattedTime = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' +
            seconds.toString().padStart(2, '0');

        // Format the date as DD/MM/YYYY
        var formattedDate = day.toString().padStart(2, '0') + '/' + month.toString().padStart(2, '0') + '/' +
            year.toString();

        // Display the time and date in a specific element on the form
        document.getElementById('current-time').textContent = 'Current Time: ' + formattedTime 
        document.getElementById('current-date').textContent = 'Current Date: ' +formattedDate;
    }

    // Call the function to display the current time and date every second
    setInterval(displayCurrentTime, 1000);
</script>
