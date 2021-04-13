@section('validate')
    <script>
        $(document).ready(function () {
                $(this).css('display','none');
                $(".profile_form .form input").prop( "readonly", false );
                $(".profile_form .save,.cancel").css('display','inline');
            }
        )
    </script>
@endsection
