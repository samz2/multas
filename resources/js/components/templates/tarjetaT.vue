<template>
    <div class="content">
	    <div class="container-fluid">
	    	<div class="row">
			 <div class="col-md-12">
	            <div class="card card-info"  v-if="formulario">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Tarjeta de circulación</h4>  
	                </div>
					<div class="card-body">
	                        <div class="row">
								<label for="" class="col-md-2">Tipo de carrocería:</label>
                                <div class="input-group col-md-4">
									<input type="text" class="form-control" v-model="tarjeta.tipo">
								</div>
							</div>
							<br>
							<div class="row">
								<label for="" class="col-md-2">Placa:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" v-model="tarjeta.placa">
								</div>
							</div>
                            <br>
							<div class="row">
								<label for="" class="col-md-2">Serie:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" v-model="tarjeta.serie">
								</div>
							</div>
                            <br>
							<div class="row">
								<label for="" class="col-md-2">Motor:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" v-model="tarjeta.motor">
								</div>
							</div>
                            <br>
							<div class="row">
								<label for="" class="col-md-2">Color:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" v-model="tarjeta.color">
								</div>
							</div>
                            <br>
                            <div class="row">
								<label for="" class="col-md-2">Año:</label>
								<div class="col-md-4">
									<input type="number" max="2022" min="1995" class="form-control" v-model="tarjeta.year">
								</div>
							</div>
                            <br>
                            <div class="row">
								<label for="" class="col-md-2">Empresa:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" v-model="tarjeta.empresa">
								</div>
							</div>
                            <br>
                            <div class="row">
								<label for="" class="col-md-2">Nro de afiliado:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" v-model="tarjeta.afiliado">
								</div>
							</div>
							<br>
							<div class="row text-left">
								<div class="col-md-2">
									<button @click="addtarjeta()" v-if="add" class="btn bg-navy">Agregar  <i class="fa fa-save"></i></button>
                                    <button @click="edittarjeta()" v-if="editar" class="btn bg-navy">Editar  <i class="fa fa-edit"></i></button>
								</div>
								<div class="col-md-2">
									<button  class="btn bg-olive" @click="ocultar('2')">
										Volver  <i class="fa fa-undo"></i>
									</button>
								</div>
							</div>
							<div class="clearfix"></div>
	                	</div>
					</div>
				</div>
	    	</div>
			<div class="row" v-if="lista">
			 <div class="col-md-12">
				<div class="card card-info">
	                <div class="card-header text-center bg-azul">
	                    <h4 class="title">TARJETAS DE CIRCULACIÓN <button  class="btn bg-navy" @click="ocultar('1')"> <i class="fa fa-plus"></i></button></h4>  
	                </div>
	                <div class="card-body">
						<div class="content table-responsive table-full-width">
                            <v-client-table :data="tarjetas" :columns="columns" :options="options">
								<div slot="Acciones" slot-scope="props">
									<!-- <button class="btn bg-indigo altoBoton" data-toggle="tooltip" v-on:click="edit(props.row.ID,props.row.Nivel)" data-placement="left" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button> -->
									<button class="btn btn-danger altoBoton" data-toggle="tooltip" v-on:click="deletetarjeta(props.row.placa)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </div>
						    </v-client-table>
                        </div>
					</div>
	    		</div>
			 </div>
			</div>	
	</div>
    <div class="container-fluid" id="error">
        <div class="row">
            <div class="col-md-12">
				<div class="card card-default">
	                <div class="card-body">
						<h1 style="color: red">Usted no tiene acceso a esta vista</h1>  
					</div>
	    		</div>
			 </div>
        </div>
    </div>
    </div>	
</template>

<script>
    export default {
    data() {
        return {
			formulario 		: false,
			lista 			: true,
			editar 			: false,
			add 			: true,
			tarjeta:{
                tipo		: null,
                placa		: null,
                serie	    : null,
                motor	    : null,
                color	    : null,
                year		: 2022,
                empresa		: null,
                afiliado	: null,
			},
			tarjetas:[{
				tipo		: null,
                placa		: null,
                serie	    : null,
                motor	    : null,
                color	    : null,
                year		: null,
                empresa		: null,
                afiliado	: null,
            }],
            columns: ["tipo","placa","serie","motor","color","year","empresa","afiliado","Acciones"],
            options: {
				perPageValues : [5,10,15,20,25,50],
                perPage : 5,
                texts: {
                    filter: "Buscar:",
                    count: "Mostando {from} a {to} de {count} registros|{count} registros|Un registro",
                    first: 'Primero',
                    last: 'Último',
                    filterPlaceholder: "Buscar",
                    limit: "Registros:",
                    page: "Pagina:",
                    noResults: "No se encontraron registros",
                    filterBy: "Filtrar por {column}",
                    loading: 'Cargando...',
                    defaultOption: 'Seleccionar {column}',
                    columns: 'Columnas'
                },
				headings:
				{
                    tipo        : "Tipo",
                    placa       : "Placa",
                    serie       : "Serie",
                    motor       : "Motor",
                    color       : "Color",
                    year        : "Año",
                    empresa     : "Empresa",
                    afiliado    : "Afiliado",
					
				},
				sortable    : ["Tipo","Placa","Serie","Motor","Color","Año","Empresa","Afiliado"],
				filterable  : ["Tipo","Placa","Serie","Motor","Color","Año","Empresa","Afiliado"]
            },
            tipo:null,
        }
	},
	created(){
        this.getDatos();
	},
	mounted(){
        $('#error').hide();
	},
    methods: {
		getDatos()
        {
            this.$Progress.start();
            axios.get("getTarjetas")
            .then(data=>
            {
                this.tarjetas = data.data.tarjetas;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
		deletetarjeta(id)
        {
            this.$Progress.start();
            axios.get("delTarjeta/"+id)
            .then(data=>
            {
                swal({
					type: 'success',
					title: 'Se ha eliminado el registro correctamente',
					showConfirmButton: false,
					timer: 2000
                });
				this.getDatos();
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })
        },
		ocultar(id){
			if(id == '1')
			{
				this.add 		= true;
				this.editar 	= false;
				this.formulario = true;
				this.lista 		= false;
			}
			else if(id == '2')
			{
				this.load();
				this.formulario = false;
				this.lista 		= true;	
			}
			
		},
		addtarjeta()
		{
			axios.post("addTarjeta",{
				tarjeta:this.tarjeta
			}).then(data=>{
				swal({
					type: data.data.type,
					title: data.data.msg,
					showConfirmButton: false,
					timer: 2000
                });
				this.load();
				this.getDatos();
			}).catch(error=>{
				console.log(error);	
				swal({
					type: 'error',
					title: 'Error',
					text: 'Verifique los campos los campos obligatorios',
					showConfirmButton: true,
				});
			})
		},
		load()
		{
			this.formulario 		= false;
			this.lista 				= true;	
			this.tarjeta.tipo		= null;
			this.tarjeta.year		= null;
			this.tarjeta.empresa	= null;
			this.tarjeta.afiliado	= null;
			this.tarjeta.color	    = null;
			this.tarjeta.motor		= null;
			this.tarjeta.serie		= null;
			this.tarjeta.placa		= null;
		}
    }
}
</script>
