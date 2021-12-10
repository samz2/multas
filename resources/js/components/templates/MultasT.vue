<template>
    <div class="content">
	    <div class="container-fluid"  id="cabecera">
	    	<div class="row">
			 <div class="col-md-12">
	            <div class="card card-info"  v-if="formulario">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">MULTAS</h4>  
	                </div>
					<div class="card-body">
	                        <div class="row">
								<label for="" class="col-md-2">Documento:</label>
                                <div class="input-group col-md-4">
									<input type="text" class="form-control" v-model="persona.dni" placeholder="DNI">
									<div class="input-group-append">
										<button class="btn btn-primary" @click="consulta(persona.dni)"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<label for="" class="col-md-2">Nombre:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" v-model="persona.nombre">
								</div>
							</div>
							<br>
							<div class="row" v-if="personanatural">
								<label for="" class="col-md-2">Apellidos:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" v-model="persona.apellidos">
								</div>
							</div>
							<br>
							<div class="row">
								<label for="" class="col-md-2">Dirección:</label>
								<div class="col-md-4">
									<input type="text" class="form-control" v-model="persona.direccion">
								</div>
							</div>
							<br>
							<div class="row" v-if="personanatural">
								<label for="" class="col-md-2">Fecha Nacimiento:</label>
								<div class="col-md-4">
									<input type="date" class="form-control" v-model="persona.fechaNac">
								</div>
							</div>
							<br>
							<div class="row text-left">
								<div class="col-md-2">
									<button @click="addPersona()" v-if="add" class="btn bg-navy">Agregar  <i class="fa fa-save"></i></button>
                                    <button @click="editPersona()" v-if="editar" class="btn bg-navy">Editar  <i class="fa fa-edit"></i></button>
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
	                    <h4 class="title">MULTAS <button  class="btn bg-navy" @click="ocultar('1')"> <i class="fa fa-plus"></i></button></h4>  
	                </div>
	                <div class="card-body">
						<div class="content table-responsive table-full-width">
                            <v-client-table :data="multas" :columns="columns" :options="options">
								<div slot="Acciones" slot-scope="props">
									<button class="btn bg-indigo altoBoton" data-toggle="tooltip" v-on:click="edit(props.row.ID,props.row.Nivel)" data-placement="left" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
									<button class="btn btn-danger altoBoton" data-toggle="tooltip" v-on:click="deleteNivel(props.row.ID)" data-placement="left" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
			personanatural	: false,
			personajuridica : false,
			formulario 		: false,
			lista 			: true,
			editar 			: false,
			add 			: true,
			persona:{
                dni			: null,
                nombre		: null,
                apellidos	: null,
                direccion	: null,
                fechaNac	: null,
                Tipo		: null,
			},
			multas:[{
				Falta	        : null,
				Infraccion		: null,
				Calificacion	: null,
				Monto	        : null,
				Descuento		: null,
				Sancion		    : null,
				Puntos		    : null,
				MedidaPreventiva: null,
				Solidario		: null,
            }],
            columns: ["Falta","Infraccion","Calificacion","Monto","Descuento","Sancion","Puntos","MedidaPreventiva","Solidario","Acciones"],
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
					Falta	        : "Falta",
                    Infraccion		: "Infracción",
                    Calificacion	: "Calificación",
                    Monto	        : "Monto",
                    Descuento		: "Descuento",
                    Sancion		    : "Sanción",
                    Puntos		    : "Puntos",
                    MedidaPreventiva: "Medida Preventiva",
                    Solidario		: "Solidario",
					
				},
				sortable    : ["Falta","Infraccion","Calificacion","Monto","Descuento","Sancion","Puntos","MedidaPreventiva","Solidario"],
				filterable  : ["Falta","Infraccion","Calificacion","Monto","Descuento","Sancion","Puntos","MedidaPreventiva","Solidario"]
            },
            tipo:null,
        }
	},
	created(){
        this.getDatos();
        this.getAutenticacion();
	},
	mounted(){
        $('#error').hide();
	},
    methods: {
        getAutenticacion()
        {
            this.$Progress.start();
            axios.get("autenticacion")
            .then(data=>
            {
                this.id = data.data.id;
                if(this.id == 1)
                {
                    $('#cabecera').show();
                    $('#error').hide();
                }else{
                    $('#cabecera').hide();
                    $('#error').show();
                }
                this.$Progress.finish();
                console.log(data.data);
            }
            ).catch(error=>{
                console.log(error);
            });
            
        },
		getDatos()
        {
            this.$Progress.start();
            axios.get("getMultas")
            .then(data=>
            {
                this.multas = data.data.multas;
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
        consulta(dni)
        {
			var longitud = dni.length;
			var tipo = "";
			if(longitud == 8) tipo = "dni";
			else if(longitud == 11) tipo = "ruc";
			else 
			{
				swal({
					type: 'error',
					title: 'Ingrese un documento con longitud valida',
					showConfirmButton: false,
					timer: 2000
                });
				return;
			}
			axios.get("https://apiperu.dev/api/"+tipo+"/"+dni+"?api_token=7460d2fa0d1d01c5fe9c96448ea0c3a1d800bae62461f6c27bfd48914e466e14")
			.then(data => {
				if(tipo == "dni")
				{
					this.persona.nombre		= data.data.data.nombres;
					this.persona.apellidos	= data.data.data.apellido_paterno + " " + data.data.data.apellido_materno;
					this.persona.direccion	= data.data.data.domicilio_direccion;
					this.persona.fechaNac	= data.data.data.fecha_nacimiento;
					this.personanatural 	= true;
					this.persona.Tipo		= "DNI";
				}else
				{
					this.persona.nombre		= data.data.data.nombre_o_razon_social;
					this.persona.direccion	= data.data.data.domicilio_direccion;
					this.personanatural 	= false;
					this.persona.Tipo		= "RUC";
				}
                
			}).catch(error => {
				console.log('Ocurrio un error ' + error);
				this.$Progress.fail();
			});
		},
		edit(id,nivel)
		{
			$('#objetivo').show();
            $('#edit').show();
            $('#add').hide();
            $('#tabla').hide();
            this.nivel.id = id;
            this.nivel.nivel = nivel;
		},
		addPersona()
		{
			axios.post("addPersona",{
				persona:this.persona
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
			this.persona.dni		= null;
			this.persona.nombre		= null;
			this.persona.apellidos	= null;
			this.persona.direccion	= null;
			this.persona.fechaNac	= null;
			this.persona.Tipo		= null;
		}
    }
}
</script>
