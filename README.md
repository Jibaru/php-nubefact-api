# [PHP] Nubefact API Integration

A fun project to try to integrate Nubefact API in PHP with Clean Code, SOLID principles and Design Patterns.

## Nubefact API Reference

[Quick Link](https://www.nubefact.com/integracion)

## Important Notes

This repository follow the [PSR12 standards](https://www.php-fig.org/psr/psr-12/).

## Docs

### Generate Invoices

| Attribute                          | Class                                                              | Accessor                     | Finished           |
|------------------------------------|--------------------------------------------------------------------|:-----------------------------|:-------------------|
| operacion                          | Jibaru\NubefactApi\ValueObjects\Operations\Operation               | value()                      | :white_check_mark: |
| tipo_de_comprobante                | Jibaru\NubefactApi\ValueObjects\VoucherType\VoucherType            | value()                      | :white_check_mark: |
| serie                              | Jibaru\NubefactApi\ValueObjects\Series\Series                      | value()                      | :white_check_mark: |
| numero                             | Jibaru\NubefactApi\ValueObjects\Numbers\Number                     | value()                      | :white_check_mark: |
| sunat_transaction                  | Jibaru\NubefactApi\ValueObjects\SunatTransactions\SunatTransaction | value()                      | :white_check_mark: |
| cliente_tipo_documento             | Jibaru\NubefactApi\ValueObjects\Clients\Documents\Document         | type()                       | :white_check_mark: |
| cliente_numero_documento           | Jibaru\NubefactApi\ValueObjects\Clients\Documents\Document         | value()                      | :white_check_mark: |
| cliente_direccion                  | Jibaru\NubefactApi\ValueObjects\Clients\Addresses\Address          | value()                      | :white_check_mark: |
| cliente_email                      | Jibaru\NubefactApi\ValueObjects\Clients\Emails\Email               | value()                      | :white_check_mark: |
| cliente_email_1                    | Jibaru\NubefactApi\ValueObjects\Clients\Emails\Email               | value()                      | :white_check_mark: |
| cliente_email_2                    | Jibaru\NubefactApi\ValueObjects\Clients\Emails\Email               | value()                      | :white_check_mark: |
| fecha_de_emision                   | Jibaru\NubefactApi\ValueObjects\Dates\IssueDate                    | formattedValue()             | :white_check_mark: |
| fecha_de_vencimiento               | Jibaru\NubefactApi\ValueObjects\Dates\DueDate                      | formattedValue()             | :white_check_mark: |
| moneda                             | Jibaru\NubefactApi\ValueObjects\Currencies\Currency                | value()                      | :white_check_mark: |
| tipo_de_cambio                     |                                                                    |                              |                    |
| porcentaje_de_igv                  | Jibaru\NubefactApi\ValueObjects\Fees\VoucherIGV                    | percentage()                 | :white_check_mark: |
| descuento_global                   | Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount              | globalDiscount()->value()    | :white_check_mark: |
| total_descuento                    | Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount              | totalDiscount()->value()     | :white_check_mark: |
| total_anticipo                     | Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount              | totalAdvance()->value()      | :white_check_mark: |
| total_gravada                      | Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount              | totalTaxed()->value()        | :white_check_mark: |
| total_inafecta                     | Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount              | totalUnaffected()->value()   | :white_check_mark: |
| total_exonerada                    | Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount              | totalExonerated()->value()   | :white_check_mark: |
| total_igv                          | Jibaru\NubefactApi\ValueObjects\Fees\VoucherIGV                    | value()                      | :white_check_mark: |
| total_gratuita                     | Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount              | totalFree()->value()         | :white_check_mark: |
| total_otros_cargos                 | Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount              | totalOtherCharges()->value() | :white_check_mark: |
| total_isc                          | Jibaru\NubefactApi\ValueObjects\Fees\VoucherISC                    | value()                      | :white_check_mark: |
| total                              | Jibaru\NubefactApi\ValueObjects\Amounts\InvoiceAmount              | total()->value()             | :white_check_mark: |
| percepcion_tipo                    |                                                                    |                              |                    |
| percepcion_base_imponible          |                                                                    |                              |                    |
| total_percepcion                   |                                                                    |                              |                    |
| total_incluido_percepcion          |                                                                    |                              |                    |
| retencion_tipo                     |                                                                    |                              |                    |
| retencion_base_imponible           |                                                                    |                              |                    |
| total_retencion                    |                                                                    |                              |                    |
| total_impuestos_bolsas             | Jibaru\NubefactApi\ValueObjects\Fees\VoucherICBPER                 | value()                      | :white_check_mark: |
| observaciones                      |                                                                    |                              |                    |
| documento_que_se_modifica_tipo     |                                                                    |                              |                    |
| documento_que_se_modifica_serie    |                                                                    |                              |                    |
| documento_que_se_modifica_numero   |                                                                    |                              |                    |
| tipo_de_nota_de_credito            |                                                                    |                              |                    |
| tipo_de_nota_de_debito             |                                                                    |                              |                    |
| enviar_automaticamente_a_la_sunat  |                                                                    |                              |                    |
| enviar_automaticamente_al_cliente  |                                                                    |                              |                    |
| codigo_unico                       |                                                                    |                              |                    |
| condiciones_de_pago                |                                                                    |                              |                    |
| medio_de_pago                      |                                                                    |                              |                    |
| placa_vehiculo                     |                                                                    |                              |                    |
| orden_compra_servicio              |                                                                    |                              |                    |
| detraccion                         |                                                                    |                              |                    |
| detraccion_tipo                    |                                                                    |                              |                    |
| detraccion_total                   |                                                                    |                              |                    |
| detraccion_porcentaje              |                                                                    |                              |                    |
| medio_de_pago_detraccion           |                                                                    |                              |                    |
| ubigeo_origen                      |                                                                    |                              |                    |
| direccion_origen                   |                                                                    |                              |                    |
| ubigeo_destino                     |                                                                    |                              |                    |
| direccion_destino                  |                                                                    |                              |                    |
| detalle_viaje                      |                                                                    |                              |                    |
| val_ref_serv_trans                 |                                                                    |                              |                    |
| val_ref_carga_efec                 |                                                                    |                              |                    |
| val_ref_carga_util                 |                                                                    |                              |                    |
| punto_origen_viaje                 |                                                                    |                              |                    |
| punto_destino_viaje                |                                                                    |                              |                    |
| descripcion_tramo                  |                                                                    |                              |                    |
| val_ref_carga_efec_tramo_virtual   |                                                                    |                              |                    |
| configuracion_vehicular            |                                                                    |                              |                    |
| carga_util_tonel_metricas          |                                                                    |                              |                    |
| carga_efec_tonel_metricas          |                                                                    |                              |                    |
| val_ref_tonel_metrica              |                                                                    |                              |                    |
| val_pre_ref_carga_util_nominal     |                                                                    |                              |                    |
| indicador_aplicacion_retorno_vacio |                                                                    |                              |                    |
| matricula_emb_pesquera             |                                                                    |                              |                    |
| nombre_emb_pesquera                |                                                                    |                              |                    |
| descripcion_tipo_especie_vendida   |                                                                    |                              |                    |
| lugar_de_descarga                  |                                                                    |                              |                    |
| cantidad_especie_vendida           |                                                                    |                              |                    |
| fecha_de_descarga                  |                                                                    |                              |                    |
| formato_de_pdf                     |                                                                    |                              |                    |
| generado_por_contingencia          |                                                                    |                              |                    |
| bienes_region_selva                |                                                                    |                              |                    |
| servicios_region_selva             |                                                                    |                              |                    |
| items                              |                                                                    |                              |                    |
| guias                              |                                                                    |                              |                    |
| venta_al_credito                   |                                                                    |                              |                    |

## Items

| Attribute                 | Class | Accessor | Finished |
|---------------------------|-------|:---------|:---------|
| unidad_de_medida          |       |          |          |
| codigo                    |       |          |          |
| descripcion               |       |          |          |
| cantidad                  |       |          |          |
| valor_unitario            |       |          |          |
| precio_unitario           |       |          |          |
| descuento                 |       |          |          |
| subtotal                  |       |          |          |
| tipo_de_igv               |       |          |          |
| tipo_de_ivap              |       |          |          |
| igv                       |       |          |          |
| impuesto_bolsas           |       |          |          |
| total                     |       |          |          |
| anticipo_regularizacion   |       |          |          |
| anticipo_documento_serie  |       |          |          |
| anticipo_documento_numero |       |          |          |
| codigo_producto_sunat     |       |          |          |
| tipo_de_isc               |       |          |          |
| isc                       |       |          |          |

## Guides

| Attribute         | Class | Accessor | Finished |
|-------------------|-------|:---------|:---------|
| guia_tipo         |       |          |          |
| guia_serie_numero |       |          |          |

## Sale on Credits

| Attribute     | Class | Accessor | Finished |
|---------------|-------|:---------|:---------|
| cuota         |       |          |          |
| fecha_de_pago |       |          |          |
| importe       |       |          |          |
