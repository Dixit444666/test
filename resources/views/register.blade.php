<html>
    <body>
        <form class="formdata">
            @csrf
            <div>
                Name:<input type="text" name="name" class="name">
            </div><br/>
            <div>
                Email:<input type="email" name="email" class="email">
            </div><br/>            
            <div>
                Password:<input type="password" name="password" class="password">
            </div><br/>            
            <div>
                grnder:<input type="radio" name="gender" class="gender" value="male">Male
                       <input type="radio" name="gender" class="gender" value="female">Female

            </div><br/>
            <div>Hobby:
                <input type="checkbox" name="hobby[]" class="hobby" value="cricket">Cricket
                <input type="checkbox" name="hobby[]" class="hobby" value="football">Football
                <input type="checkbox" name="hobby[]" class="hobby" value="hockey">Hockey

            </div><br/>
            <div>City:
                <select name="city" class="city">
                    <option value="">Select City</option>
                    <option value="surat">Surat</option>
                    <option value="ahemdabad">Ahemdabad</option>
                    <option value="vadodra">Vadodra</option>
                </select>

            </div><br/>
            <input type="submit" name="submit" value="submit" class="submit"> 
        </form>
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(".submit").click(function(e){
        // alert("d")
        e.preventDefault();
        var data = $(".formdata").serialize();
     

        // console.log(data);
    });
    // if(name!="" && email!="" && passworsd!="" && city!="" && gender!=""&& hobby!=""){
        $.ajax({
            url : "{{ route('data') }}",
            type : "POST",
            data:{
                data : data,
                _token: $("#csrf").val(),
            }
        //    success : function(response){
        //        console.log(response);
        //    }
        })
    // }
</script>