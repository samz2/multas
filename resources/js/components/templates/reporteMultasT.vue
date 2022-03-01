<template>
    <div class="content">
	    <div class="container-fluid">
	    	<div class="row">
			 <div class="col-md-12">
	            <div class="card card-info">
	                <div class="card-header bg-azul text-center">
	                    <h4 class="title">Multas</h4>  
	                </div>
					<div class="card-body">
	                    <fieldset class="border p-2">
                            <legend class="w-auto t16 text-primary"><b>Búsqueda de multas</b></legend>
                            <div class="row">
								<label for="" class="col-md-2">Fecha Inicio:</label>
                                <div class="input-group col-md-4">
									<input type="date" class="form-control form-control-sm" v-model="registro.fechaInicio" placeholder="DNI">
									
								</div>
                                <label for="" class="col-md-2">Fecha Final:</label>
                                <div class="input-group col-md-4">
									<input type="date" class="form-control form-control-sm" v-model="registro.fechaFinal" placeholder="DNI">
									<div class="input-group-append">
										<button class="btn btn-primary"  @click="consulta(registro.fechaInicio,registro.fechaFinal)"><i class="fa fa-search"></i></button>
									</div>
								</div>

							</div>
                            <div class="row">
                                <a :href='"reporte/"+registro.fechaInicio+"/"+registro.fechaFinal' target="_blank"><button class="btn btn-primary">Descargar PDF</button></a>
                            </div>
							<br>
							<br>
                        </fieldset>    
	                	</div>
					</div>
				</div>
	    	</div>
			<div class="row" v-if="lista">
			 <div class="col-md-12">
				<div class="card card-info">
	                <div class="card-header text-center bg-azul">
	                    <h4 class="title">Listado de Multas</h4>  
	                </div>
	                <div class="card-body">
						<div class="content table-responsive table-full-width">
                            <v-client-table :data="multas" :columns="columns" :options="options">
						    </v-client-table>
                        </div>
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
            multas:[{label:null,code:null}],
			personanatural	: false,
			personajuridica : false,
			formulario 		: false,
			lista 			: true,
			editar 			: false,
			add 			: true,
			multaz 			: null,
            registro:
            {
				fechaInicio	: null,
                fechaFinal	: null,
            },
			multas:[{
				Documento	: null,
				Nombre		: null,
				Fecha	    : null,
				Monto	    : null,
				Descuento	: null,
				Multa	    : null,
				Placa	    : null,
				Modelo	    : null,
            }],
            columns: ["Documento","Nombre","Fecha","Monto","Descuento","Modelo","Placa","Multa"],
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
					Documento	: "Documento",
					Nombre		: "Nombres",
					Fecha	    : "Fecha",
					Monto	    : "Monto",
					Descuento	: "Descuento",
					
				},
				sortable    : ["Documento","Nombre","Fecha","Descuento","Monto","Modelo","Placa","Multa"],
				filterable  : ["Documento","Nombre","Fecha","Descuento","Monto","Modelo","Placa","Multa"]
            },
            tipo:null,
        }
	},
	created(){
        // this.getMultas();
	},
	mounted(){
        $('#error').hide();
	},
    methods: {
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
        consulta(fechai,fechaf)
        {
            this.$Progress.start();
            axios.get("getMultasImpagas/"+fechai+"/"+fechaf)
            .then(data=>
            {
                this.multas = data.data.multas;
                this.$Progress.finish();
            }
            ).catch(error=>{
                console.log(error);
            })

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
		addRegistro()
		{
			this.registro.multa = this.multaz.code;
			axios.post("addRegistro",{
				persona:this.persona,
				registro:this.registro,
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
			this.formulario 			= false;
			this.lista 					= true;	
			this.persona.dni			= null;
			this.persona.nombre			= null;
			this.persona.apellidos		= null;
			this.persona.direccion		= null;
			this.persona.fechaNac		= null;
			this.persona.Tipo			= null;
			this.registro.dni			= null;
			this.registro.placa			= null;
			this.registro.fabricacion	= null;
			this.registro.modelo		= null;
		}
    }
}
</script>
