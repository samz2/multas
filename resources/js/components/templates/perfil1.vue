<template>
	<div class="container-fluid">
		<br><br>
			<!-- <div v-if="!cargando1 && !cargando2 && !cargando3" class="row justify-content-center">
				<div  class="spinner-border text-primary" role="status">
				</div>
				<br>
				<b class="text-primary">Cargando Contenido ...</b>
			</div> -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
						<div class="inner">
							<h3></h3>
							<p>REGISTRADOS</p>
						</div>
						<div class="icon">
							<i class="ion ion-person"></i>
						</div>
							<a href="#" class="small-box-footer">Mas Información<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3></h3>

                        <p>MULTAS PAGADAS</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-card"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas Información<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                            <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                        <h3></h3>

                        <p>MULTAS PENDIENTES</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-card"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas Información<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                        <h3></h3>

                        <p>INGRESO TOTAL MENSUAL</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">Mas Información<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
	</div>    
</template>

<script>
    export default {
    data() {
        return {

			matriculados:null,
			pagadas:null,
			nopagadas:null,
			ingresos:null,
            cargando1:false,
            cargando2:false,
            cargando3:false,
        }
	},
	mounted()
	{
		$('#cod').hide();
		$('#objetivo').hide();
		$('#matricula').hide();
	},
	created()
    {
		// this.getMatriculados();
		// this.getPensiones();
		// this.getIngresos();
    },
    methods: {
  		getIngresos()
		{
			this.cargando1 = false;
			this.$Progress.start();
			axios.get("getIngresos")
			.then(data=>
			{
				this.cargando1 = true;
				this.ingresos = data.data.ingreso;
				this.$Progress.finish();
			}
			).catch(error=>
			{
				console.log(error);
			})
		},
		getMatriculados()
		{
			this.cargando2 = false;
			this.$Progress.start();
			axios.get("getNummatriculados")
			.then(data=>
			{
				this.cargando2 = true;
				this.matriculados = data.data.cantidad;
				this.$Progress.finish();
			}
			).catch(error=>
			{
				console.log(error);
			})
		},
		getPensiones()
		{
			this.cargando3 = false;
			this.$Progress.start();
			axios.get("/getpensiones")
			.then(data=>
			{
				this.cargando3 = true;
				this.pagadas = data.data.pagados;
				this.nopagadas = data.data.nopagados;
				this.$Progress.finish();
			}
			).catch(error=>
			{
				console.log(error);
			})
		},
		
    }
}
</script>
