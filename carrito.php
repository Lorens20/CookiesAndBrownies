<?php require_once "config/conexion.php";
require_once "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="descripcion" content="PASTELERIA BROWNIES AND COOKIES">
    <title>Cookie</title>
    <link rel="shortcut icon" href="assets/logo.ico" />
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link href="assets/css/estilos.css" rel="stylesheet" >
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<header>
    <div class="ancho">
        <a href="./index.php"><img src="assets/logo.ico" id="logo" ></a>
        <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Carrito</h1>
                <p class="lead fw-normal text-white-50 mb-0">Tus Productos Agregados.</p>
            </div>
    </div>
    </header>

<body>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Sub Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tblCarrito">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 ms-auto">
                    <h4>Total a Pagar: <span id="total_pagar">0.00</span></h4>
                    <div class="d-grid gap-2">
                        <div id="paypal-button-container"></div>
                        <button class="btn btn-warning" type="button" id="btnVaciar">Vaciar Carrito</button>
                    <div class ="row">
                       
                </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
        <!-- Modal -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿ Desea eliminar el producto de la lista?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="btn-elimina" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
</div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Company Lgp © 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo CURRENCY ; ?>"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        mostrarCarrito();

        function mostrarCarrito() {
            if (localStorage.getItem("productos") != null) {
                let array = JSON.parse(localStorage.getItem('productos'));
                if (array.length > 0) {
                    $.ajax({
                        url: 'ajax.php',
                        type: 'POST',
                        async: true,
                        data: {
                            action: 'buscar',
                            data: array
                        },
                        success: function(response) {
                            console.log(response);
                            const res = JSON.parse(response);
                            let html = '';
                            res.datos.forEach(element => {
                                html += `
                            <tr>
                                <td>${element.nombre}</td>
                                <td>${element.precio}</td>
                                <td>1</td>
                                <td>${element.precio}</td>
                                <td>
                                <form>
                                
                                    
                                <td><a id= "eliminar" class="btn btn-warning btn-sm" data-id="${element.id}" data-bs-toggle="modal" data-bs-target="#eliminaModal">Eliminar</a></td></td>
                            </tr>
                            `;
                            });
                            $('#tblCarrito').html(html);
                            $('#total_pagar').text(res.total);
                            paypal.Buttons({
                                style: {
                                    color: 'blue',
                                    shape: 'pill',
                                    label: 'pay'
                                },
                                createOrder: function(data, actions) {
                                    // This function sets up the details of the transaction, including the amount and line item details.
                                    return actions.order.create({
                                        purchase_units: [{
                                            amount: {
                                                value: res.total
                                            }
                                        }]
                                    });
                                },
                                onApprove: function(data, actions) {
                                    // This function captures the funds from the transaction.
                                    return actions.order.capture().then(function(details) {
                                        // This function shows a transaction success message to your buyer.
                                        alert('Transaction completed by ' + details.payer.name.given_name);
                                    });
                                }
                            }).render('#paypal-button-container');
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            }
        }
         let eliminaModal = document.getElementById('eliminaModal')
         eliminaModal.addEventListener('show.bs.modal', function(event){
             let button = event.relatedTarget
             let id = button.getAttribute('data-id')
             let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina')
             buttonElimina.value = id
         })

         function eliminar (){
             let botonElimina = document.getElementById('btn-elimina')
             let id = botonElimina.value
             let url = 'elimina_carrito.php'
             let formData = new FormData()
             formData.append('action','eliminar')
             formData.append('id', id)

             fetch(url,{
                 method:'POST',
                 body: formData,
                 mode :'cors'
             }).then(response => response.json())
             .then(data=>{
                 if(data.ok){
                     location.reload()

                 }
             })
         }

    </script>


</body>

</html>