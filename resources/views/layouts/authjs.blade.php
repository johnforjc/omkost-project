<script>
    function register()
    {
        $.ajax({
            type  : 'POST',
            url   : "{{ url('/api/register') }}",
            dataType : 'json',
            data : {
                name        :$('#txtnama').val(), 
                telp        :$('#txttelp').val(),
                email       :$('#txtemail').val(), 
                password    :$('#txtpassword').val()
            },
            success : function(response){
                var data = response.data;
                if(response.status)
                {
                    alert(response.message);
                    $('#signup').modal('hide');
                }
                else
                {
                    alert(response.message);
                }
            },
            error: function(err){
                alert("Login Error, hubungi admin")
            }
        });
    }

    function login()
    {
        $.ajax({
            type  : 'POST',
            url   : "{{ url('/api/login') }}",
            dataType : 'json',
            data : {
                email:$('#txtemaillogin').val(), 
                password:$('#txtpasswordlogin').val()
            },
            success : function(response){
                var data = response.data;
                if(response.status)
                {
                    document.cookie = "nama=" + data.nama + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/"; 
                    document.cookie = "email=" + data.email + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/"; 
                    document.cookie = "api_token=" + data.token + "; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/"; 
                    //location.reload();
                    window.location = "{{ url('/dashboard') }}";
                }
                else
                {
                    alert(response.message);
                }
            },
            error: function(err){
                alert("Login Error, hubungi admin")
            }
        });
    }

    function logout()
    {
        $.ajax({
            type  : 'GET',
            url   : "{{ url('/api/logout') }}",
            dataType : 'json',
            headers: {
                "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
            },
            success : function(response){
                //var data = response.data;
                if(response.status)
                {
                    deleteAllCookies();
                    //location.reload();
                    window.location = "{{ url('/') }}";
                }
                else
                {
                    alert(response.message);
                }
            },
            error: function(err){
                alert("Logout Error, hubungi admin")
            }
        });
    }

    function deleteAllCookies() {
        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }
    
    
    /*
    function alertCookieValue() {
        const cookieValue = document.cookie
        .split('; ')
        .find(row => row.startsWith('api_token='))
        .split('=')[1];
        alert(cookieValue);
    }

    window.onload=alertCookieValue();
    */
</script>