<div class="form-wizard-basic fw-container col-sm-12">
    <ul class="tab-nav text-center fw-nav" tabindex="11" style="overflow: hidden; outline: none;">
        <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="false">Flujograma</a></li>
        <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Procedimientos</a></li>
        <li class=""><a href="#tab3" data-toggle="tab" aria-expanded="false">Formularios</a></li>
        <li class=""><a href="#tab4" data-toggle="tab" aria-expanded="false">Normatividad</a></li>
        <li class=""><a href="#tab5" data-toggle="tab" aria-expanded="false">Plano de zonificacion y compatibilidad de uso</a></li>
        <li class=""><a href="#tab6" data-toggle="tab" aria-expanded="true">Reporte de licencias</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tab1">

        </div>

        <div class="tab-pane fade" id="tab2">
            <?php
                $normas=array(
                    array(
                        "Requisitos generales para la obtencion de licencias de funcionamiento",
                        "ProcedimientosLinFunc.pdf"
                    ),
                );
            ?>
            <table class="table table-bordered table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>DESCRIPCION</th>
                        <th>DESCARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cont=1; foreach ($normas as $reg): ?>
                    <tr>
                        <td><?php echo "0".$cont++; ?></td>
                        <td><?php echo $reg[0]; ?></td>
                        <td>
                            <a href="<?php echo site_url("archivos/$reg[1]"); ?>" target="_blanck">
                                <img src="<?php echo site_url("img/pdf2.png"); ?>" height="32">
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="tab3">
            <?php
                $normas=array(
                    array(
                        "Solicitud de Licencia de Funcionamiento",
                        "solicitud_licencia.pdf",
                    ),
                    array(
                        "Ejemplo de solicitu de Licencia de Funcionamiento Llenado",
                        "ejemplo_solicitud_licencia.pdf",
                    ),
                );
            ?>
            <table class="table table-bordered table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>DESCRIPCION</th>
                        <th>DESCARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cont=1; foreach ($normas as $reg): ?>
                    <tr>
                        <td><?php echo "0".$cont++; ?></td>
                        <td><?php echo $reg[0]; ?></td>
                        <td>
                            <a href="<?php echo site_url("archivos/$reg[1]"); ?>" target="_blanck">
                                <img src="<?php echo site_url("img/pdf2.png"); ?>" height="32">
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="tab4">
            <?php
                $normas=array(
                    array(
                        "Ley N° 28976",
                        "Ley Marco De Licencia De Funcionamiento",
                        "ley_28976.pdf",
                    ),
                    array(
                        "Decreto Supremo N° 058-2014-PCM",
                        "Decreto Supremo que aprueba el Reglamento de Inspecciones Técnicas de Seguridad de Edificaciones",
                        "ds-058-2014-PCM.pdf",
                    ),
                    array(
                        "Resolución Jefatural N° 066-2016-CENEPRED/J",
                        "Aprobar el Manual de Ejecución de Inspección Técnica de Seguridad en Edificaciones",
                        "rj-066-2016-CENEPRED.pdf",
                    ),
                    array(
                        "Decreto Supremo N° 006-2013-PCM",
                        "Aprueba la relación de autorizaciones sectoriales para el otorgamiento de licencias",
                        "DECRETO-SUPREMO-006-2013-PCM.pdf",
                    ),
                    array(
                        "Ordenanza Municipal 024-2016-MPP",
                        "Ordenanza que aprueba la modificación del Texto Único de Procedimientos Administrativos de la Municipalidad Provincial de Puno, adecuado a la Resolución Ministerial 088-2015-PCM.",
                        "ordenanza_024_2016.pdf",
                    ),
                );
            ?>
            <table class="table table-bordered table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>LEGISLACION</th>
                        <th>DESCRIPCION</th>
                        <th>DESCARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cont=1; foreach ($normas as $reg): ?>
                    <tr>
                        <td><?php echo "0".$cont++; ?></td>
                        <td><?php echo $reg[0]; ?></td>
                        <td><?php echo $reg[1]; ?></td>
                        <td>
                            <a href="<?php echo site_url("archivos/$reg[2]"); ?>" target="_blanck">
                                <img src="<?php echo site_url("img/pdf2.png"); ?>" height="32">
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="tab5">
            <?php
                $normas=array(
                    array(
                        "Plano de Zonificación",
                        "plano.pdf",
                    ),
                    array(
                        "Cuadro de compatibilidad de uso",
                        "cuadro.pdf",
                    ),
                );
            ?>
            <table class="table table-bordered table-condensed table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nro.</th>
                        <th>DESCRIPCION</th>
                        <th>DESCARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cont=1; foreach ($normas as $reg): ?>
                    <tr>
                        <td><?php echo "0".$cont++; ?></td>
                        <td><?php echo $reg[0]; ?></td>
                        <td>
                            <a href="<?php echo site_url("archivos/$reg[1]"); ?>" target="_blanck">
                                <img src="<?php echo site_url("img/pdf2.png"); ?>" height="32">
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="tab6">
            
        </div>
    </div>
</div>