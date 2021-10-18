<html>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<body>


    <form class="formdata" method="post" action="{{ route('savedata') }}">
        <input type="hidden" name="id" class="" id="id" disabled><br /><br />
        Name:<input type="text" name="name" class="name"><br /><br />
        Email:<input type="email" name="email" class="email"><br /><br />
        Phone:<input type="phone" name="phone" class="phone"><br /><br />
        <input type="button" name="submit" class="submit" value="submit" onclick="return savedata()">
        <input type="button" id="update" name="update" class="" value="update" onclick="return updatedata()">

    </form>
    <table border="1">
        <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>phone</th>
            <th>phone</th>
            <th>action</th>


        </tr>
    </thead>
        <tbody>

        </tbody>
    </table><br />
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    function savedata() {
        $('.update').hide();
        $('#id').show();
        var name = $('.name').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '{{ route('savedata') }}',
            data: {
                name: name,
                email: email,
                phone: phone
            },
            success: function(response) {
                viewdata();
            }
        })
    }

    function viewdata() {
        $('#update').hide();

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/cruds',
            success: function(response) {
                var rows = '';
                $.each(response, function(key, value) {
                    rows = rows + "<tr>";
                    rows = rows + "<td>" + value.id + "</td>";
                    rows = rows + "<td>" + value.name + "</td>";
                    rows = rows + "<td>" + value.email + "</td>";
                    rows = rows + "<td>" + value.phone + "</td>";
                    rows = rows + "<td><input type='button' onclick='deletedata(" + value.id +
                        ")'value='Delete'></td>";
                    rows = rows + "<td><input type='button' onclick='editdata(" + value.id +
                        ")'value='Edit'></td>";

                    rows = rows + "</td></tr>";
                    // console.log(rows);

                });
                $('tbody').html(rows);
            }
        });

    }
viewdata();
    function editdata(id) {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: '/edit/' + id,
            success: function(response) {
                $('.id').show();
                $('#update').show();
                $('.submit').hide();

                //    console.log(myid);
                console.log(response);
                $('#id').val(response.id);
                $('.name').val(response.name);
                $('.email').val(response.email);
                $('.phone').val(response.phone);

                //    viewdata();
            }
        })
    }
    function deletedata(id) {
        $.ajax({
            type: "DELETE",
            dataType: 'json',
            url: '/delete/' + id,
            success: function(response) {
                viewdata();
            }
        })
    }

   

    function updatedata(id) {
        $('#id').show();

        console.log(id)
        var id = $('#id').val();
        var name = $('.name').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        console.log(id,name, email, phone);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/update/'+id,
            data: {
                id:id,
                name: name,
                email: email,
                phone: phone
            },
            success: function(response) {
                viewdata();

            }
        })
    }
</script>
