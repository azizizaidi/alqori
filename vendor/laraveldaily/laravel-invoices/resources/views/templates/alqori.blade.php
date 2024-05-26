<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    body {
        font-family: sans-serif;
        font-size: 10pt;
    }

    p {
        margin: 0pt;
    }

    table.items {
        border: 0.1mm solid #e7e7e7;
    }

    td {
        vertical-align: top;
    }

    .items td {
        border-left: 0.1mm solid #e7e7e7;
        border-right: 0.1mm solid #e7e7e7;
    }

    table thead td {
        text-align: center;
        border: 0.1mm solid #e7e7e7;
    }

    .items td.blanktotal {
        background-color: #EEEEEE;
        border: 0.1mm solid #e7e7e7;
        background-color: #FFFFFF;
        border: 0mm none #e7e7e7;
        border-top: 0.1mm solid #e7e7e7;
        border-right: 0.1mm solid #e7e7e7;
    }

    .items td.totals {
        text-align: right;
        border: 0.1mm solid #e7e7e7;
    }

    .items td.cost {
        text-align: "."center;
    }
    </style>
 </head>

<body>
{{-- Header --}}
        @if($invoice->logo)
            <img src="{{ $invoice->getLogo() }}" alt="logo" height="100" >
        @endif
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
      
        <tr>
            <td width="100%" style="text-align: center; font-size: 20px; font-weight: bold; padding: 0px;">
            {{ $invoice->name }}
            </td>
        </tr>
        <tr>
          <td height="10" style="font-size: 0px; line-height: 10px; height: 10px; padding: 0px;">&nbsp;</td>
        </tr>
    </table>
    <table width="100%" style="font-family: sans-serif;" cellpadding="10">
        <tr>
            <td width="49%" style="border: 0.1mm solid #eee;"><b>Bill To</b><br>{{ $invoice->buyer->name }}
            <br><br><b>Teacher</b><br>{{ $invoice->seller->name }} <br><br>
            <b>Invoice No.</b><br>{{$invoice->seller->id_invoice}}</td>
            <td width="2%">&nbsp;</td>
            <td width="49%" style="border: 0.1mm solid #eee; text-align: right;"><strong>Account Bank:</strong>
            <br> CIMB Bank<br>ALQORI ACADEMY ENTERPRISE<br> 8010231211<br><br><strong>Telephone:</strong> +601162218429<br>
            <a href="#" target="_blank" style="color: #000; text-decoration: none;">alqori.com</a><br>
            <strong>Invoice Date:</strong> {{ $invoice->seller->date }}<br></td>
             
        
        </tr>
    </table>
    <br>
    
    <br>
    <table class="items" width="100%" style="font-size: 14px; border-collapse: collapse;" cellpadding="8">
        <thead>
            <tr>
                <td width="15%" style="text-align: left;"><strong>No.</strong></td>
                <td width="45%" style="text-align: left;"><strong>Description</strong></td>
                <td width="20%" style="text-align: left;"><strong>Hour</strong></td>
                <td width="20%" style="text-align: left;"><strong>Rate</strong></td>
                <td width="20%" style="text-align: left;"><strong>Fee</strong></td>
            </tr>
        </thead>
        <tbody>
       <!--fee_student dah betul, edit rate sahaja-->
        @foreach( $invoice->seller->custom_fields as $key => $value)
        

        
            <tr>
            <!--{{$i = 1, $i < 8, $i++}}-->
                <td style="padding: 0px 7px; line-height: 20px;"> </td>
                <td style="padding: 0px 7px; line-height: 20px;">  {{ $value->class_name->name ?? '' }}</td>
                <td style="padding: 0px 7px; line-height: 20px;">{{ $value->total_hour ?? '' }}</td>
                 <!-- rate-->

                @if($value->class_name->name  == "Fardhu Ain Online AQ")
                @if( $value->total_hour <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM40</td>
                @elseif( $value->total_hour <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM35</td>
                @elseif( $value->total_hour >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM30</td>
                @endif

                @elseif($value->class_name->name  == "Al-Quran Online AQ")
                @if( $value->total_hour <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM35</td>
                @elseif( $value->total_hour <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM30</td>
                @elseif( $value->total_hour >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM25</td>
                @endif

                @elseif($value->class_name->name  == "Fardhu Ain Fizikal AQ")
                @if( $value->total_hour <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM60</td>
                @elseif( $value->total_hour <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM55</td>
                @elseif( $value->total_hour >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM50</td>
                @endif

                @elseif($value->class_name->name  == "Al-Quran Fizikal AQ")
                @if( $value->total_hour <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM50</td>
                @elseif( $value->total_hour <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM45</td>
                @elseif( $value->total_hour >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM40</td>
                @endif

                @elseif($value->class_name->name  == "Fardhu Ain Fizikal DQ")
                @if( $value->total_hour <= 4.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM70</td>
                @elseif( $value->total_hour <= 8.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM65</td>
                @elseif( $value->total_hour >= 9)
                <td style="padding: 0px 7px; line-height: 20px;">RM60</td>
                @endif

                @elseif($value->class_name->name  == "Al-Quran Fizikal DQ")
                @if( $value->total_hour <= 4.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM60</td>
                @elseif( $value->total_hour <= 8.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM55</td>
                @elseif( $value->total_hour >= 9)
                <td style="padding: 0px 7px; line-height: 20px;">RM50</td>
                @endif

                @else
                <td style="padding: 0px 7px; line-height: 20px;">  RM{{ $value->class_name->feeperhour ?? '' }}</td>


                @endif
              <!-- total fee classname-->

                @if($value->class_name->name  == "Fardhu Ain Online AQ")
                @if( $value->total_hour <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 40 * $value->total_hour }}</td>
                @elseif( $value->total_hour <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 35 * $value->total_hour }}</td>
                @elseif( $value->total_hour >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 30 * $value->total_hour }}</td>
                @endif

                @elseif($value->class_name->name  == "Al-Quran Online AQ")
                @if( $value->total_hour <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 35 * $value->total_hour }}</td>
                @elseif( $value->total_hour <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 30 * $value->total_hour }}</td>
                @elseif( $value->total_hour >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 25 * $value->total_hour }}</td>
                @endif

                @elseif($value->class_name->name  == "Fardhu Ain Fizikal AQ")
                @if( $value->total_hour <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 60 * $value->total_hour }}</td>
                @elseif( $value->total_hour <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 55 * $value->total_hour }}</td>
                @elseif( $value->total_hour >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 50 * $value->total_hour }}</td>
                @endif

                @elseif($value->class_name->name  == "Al-Quran Fizikal AQ")
                @if( $value->total_hour <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 50 * $value->total_hour }}</td>
                @elseif( $value->total_hour <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 45 * $value->total_hour }}</td>
                @elseif( $value->total_hour >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 40 * $value->total_hour }}</td>
                @endif

                @elseif($value->class_name->name  == "Fardhu Ain Fizikal DQ")
                @if( $value->total_hour <= 4.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 70 * $value->total_hour }}</td>
                @elseif( $value->total_hour <= 8.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 65 * $value->total_hour }}</td>
                @elseif( $value->total_hour >= 9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 60 * $value->total_hour }}</td>
                @endif

                @elseif($value->class_name->name  == "Al-Quran Fizikal DQ")
                @if( $value->total_hour <= 4.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 60 * $value->total_hour }}</td>
                @elseif( $value->total_hour <= 8.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 55 * $value->total_hour }}</td>
                @elseif( $value->total_hour >= 9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 50 * $value->total_hour }}</td>
                @endif

                @else
                <td style="padding: 0px 7px; line-height: 20px;">  RM{{ $value->class_name->feeperhour * $value->total_hour ?? '' }}</td>
                @endif
              
            </tr>
          
            @endforeach
            @foreach( $invoice->seller->custom_fields as $key => $value)
        
        <tr>
       
            <td style="padding: 0px 7px; line-height: 20px;"> </td>
            <td style="padding: 0px 7px; line-height: 20px;">  {{ $value->class_name_2->name ?? '' }}</td>
            <td style="padding: 0px 7px; line-height: 20px;">{{ $value->total_hour_2 ?? '' }}</td>
         @if($value->class_name_2 != NULL)
            @if($value->class_name_2->name  == "Fardhu Ain Online AQ")
                @if( $value->total_hour_2 <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM40</td>
                @elseif( $value->total_hour_2 <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM35</td>
                @elseif( $value->total_hour_2 >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM30</td>
                @endif

                @elseif($value->class_name_2->name  == "Al-Quran Online AQ")
                @if( $value->total_hour_2 <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM35</td>
                @elseif( $value->total_hour_2 <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM30</td>
                @elseif( $value->total_hour_2 >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM25</td>
                @endif

                @elseif($value->class_name_2->name  == "Fardhu Ain Fizikal AQ")
                @if( $value->total_hour_2 <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM60</td>
                @elseif( $value->total_hour_2 <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM55</td>
                @elseif( $value->total_hour_2 >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM50</td>
                @endif

                @elseif($value->class_name_2->name  == "Al-Quran Fizikal AQ")
                @if( $value->total_hour_2 <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM50</td>
                @elseif( $value->total_hour_2 <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM45</td>
                @elseif( $value->total_hour_2 >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM40</td>
                @endif

                @elseif($value->class_name_2->name  == "Fardhu Ain Fizikal DQ")
                @if( $value->total_hour_2 <= 4.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM70</td>
                @elseif( $value->total_hour_2 <= 8.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM65</td>
                @elseif( $value->total_hour_2 >= 9)
                <td style="padding: 0px 7px; line-height: 20px;">RM60</td>
                @endif

                @elseif($value->class_name_2->name  == "Al-Quran Fizikal DQ")
                @if( $value->total_hour_2 <= 4.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM60</td>
                @elseif( $value->total_hour_2 <= 8.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM55</td>
                @elseif( $value->total_hour_2 >= 9)
                <td style="padding: 0px 7px; line-height: 20px;">RM50</td>
                @endif



                @else
                <td style="padding: 0px 7px; line-height: 20px;">  RM{{ $value->class_name_2->feeperhour ?? '' }}</td>


                @endif
              @endif
              <!-- total fee classname 2-->
              @if($value->class_name_2 != NULL)
                @if($value->class_name_2->name  == "Fardhu Ain Online AQ")
                @if( $value->total_hour_2 <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 40 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 35 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 30 * $value->total_hour_2 }}</td>
                @endif

                @elseif($value->class_name_2->name  == "Al-Quran Online AQ")
                @if( $value->total_hour_2 <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 35 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 30 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 25 * $value->total_hour_2 }}</td>
                @endif

                @elseif($value->class_name_2->name  == "Fardhu Ain Fizikal AQ")
                @if( $value->total_hour_2 <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 60 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 55 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 50 * $value->total_hour_2 }}</td>
                @endif

                @elseif($value->class_name_2->name  == "Al-Quran Fizikal AQ")
                @if( $value->total_hour_2 <= 7.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 50 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 <= 11.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 45 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 >= 12)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 40 * $value->total_hour_2 }}</td>
                @endif

                @elseif($value->class_name_2->name  == "Fardhu Ain Fizikal DQ")
                @if( $value->total_hour_2 <= 4.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 70 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 <= 8.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 65 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 >= 9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 60 * $value->total_hour_2 }}</td>
                @endif

                @elseif($value->class_name_2->name  == "Al-Quran Fizikal DQ")
                @if( $value->total_hour_2 <= 4.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 60 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 <= 8.9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 55 * $value->total_hour_2 }}</td>
                @elseif( $value->total_hour_2 >= 9)
                <td style="padding: 0px 7px; line-height: 20px;">RM{{ 50 * $value->total_hour-2 }}</td>
                @endif

                @else
                <td style="padding: 0px 7px; line-height: 20px;"> RM{{ $value->class_name_2->feeperhour * $value->total_hour_2 ?? '' }}</td>
                @endif
            @endif
              
        </tr>
      
        @endforeach
          
        </tbody>
    </table>
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;" >
        <tr>
            <td>
                
                <table width="40%" align="right" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;"><strong>Total Fee</strong></td>
                        <td style="border: 1px #eee solid; padding: 0px 8px; line-height: 20px;">RM{{ $value->fee_student ?? '' }}</td>
                    </tr>
                   
                    
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table width="100%" style="font-family: sans-serif; font-size: 14px;" >
        <br>
        <tr>
            <td>
                <table width="25%" align="left" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                       
                    </tr>
                </table>
                <table width="50%" align="left" style="font-family: sans-serif; font-size: 13px; text-align: center;" >
                     <tr>
                        <td align="left" style="padding: 0px; line-height: 20px;">
                            <strong style="color:red;">Class Date</strong>
                            <br>
                          {{ $invoice->seller->class_date }}
                            <br>
                             <br>
                          {{ $invoice->seller->class_date_2 }}
                            <br>
                          
                            <br>
                            
                            <br>
                            
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="padding: 0px; line-height: 20px;">
                            <strong style="color:red;">Terms</strong>
                            <br>
                           Pembayaran hendaklah dibuat selewat-lewatnya lima hari selepas invois dikeluarkan. Kelewatan boleh menyebabkan kelas ditangguhkan buat sementara. Terima kasih.
                            <br>
                          
                            <br>
                            
                            <br>
                            
                        </td>
                    </tr>
                </table>
                <table width="25%" align="right" style="font-family: sans-serif; font-size: 14px;" >
                    <tr>
                        
                    </tr>
                </table>
            </td>
        </tr>
        <br>
    </table>
    </body>
</html>