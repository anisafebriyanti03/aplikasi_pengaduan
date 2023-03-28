<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- Page JS -->
  <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
  
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    <!-- data table -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

  <script>
        $(function() {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') }
            });

            $(function(){
                $('#provinsi').on('change',function(){
                    let id_provinsi = $('#provinsi').val();
                    
                    $.ajax({
                        type : 'POST',
                        url : "{{route('getkabupaten')}}",
                        data : {id_provinsi:id_provinsi},
                        cache : false,

                        success: function(msg){
                            $('#kabupaten').html(msg);
                            $('#kecamatan').html('');
                            $('#desa').html('');
                        },
                        error: function(data){
                            console.log('error:',data);
                        },
                    })
                })

                $('#kabupaten').on('change',function(){
                    let id_kabupaten = $('#kabupaten').val();
                    
                    $.ajax({
                        type : 'POST',
                        url : "{{route('getkecamatan')}}",
                        data : {id_kabupaten:id_kabupaten},
                        cache : false,

                        success: function(msg){
                            $('#kecamatan').html(msg);
                            $('#desa').html('');
                        },
                        error: function(data){
                            console.log('error:',data);
                        },
                    })
                })

                $('#kecamatan').on('change',function(){
                    let id_kecamatan = $('#kecamatan').val();
                    
                    $.ajax({
                        type : 'POST',
                        url : "{{route('getdesa')}}",
                        data : {id_kecamatan:id_kecamatan},
                        cache : false,

                        success: function(msg){
                            $('#desa').html(msg);
                        },
                        error: function(data){
                            console.log('error:',data);
                        },
                    })
                })
            });
        });
  </script>

<script>
    if ($('#table-data')) {
        $('#table-data').DataTable()
    }
</script>

<script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 3000);
  </script>