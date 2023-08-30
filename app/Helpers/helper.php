<?php

namespace App\Helpers;

use App\AtualizacoesContrato;
use App\CalendarioAluno;
use App\Contrato;
use App\Faturamento;
use App\FaturamentoContrato;
use App\Models\AnuncioInformacoes;
use App\Models\Leads;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Carbon;

class Helper{

	public static function converte_reais_to_mysql($valor) {
		$valor = str_replace('.', '', $valor);
		$valor = str_replace(',', '.', $valor);

		return $valor;
	}


	public static function converte_valor_real($valor) {
		if (is_numeric($valor)) {
			try {
				$valor = number_format($valor,2,",",".");
			} catch (\Exception $e) {
				return $valor;
			}

			if($valor > 0) {
				return $valor;
			} else {
				return 0;
			}
		}
	}

	/*
	public static function response($content = '', $status = 200, array $headers = []){
		$factory = app(ResponseFactory::class);

		if (func_num_args() === 0) {
			return $factory;
		}

		return $factory->make($content, $status, $headers);
	}*/

	public static function limpa_campo($valor){
		$valor = preg_replace("/\D+/", "", $valor); // remove qualquer caracter não numérico
		return $valor;
	}

	/*
	public static function isMobile(){
		$agent = new Agent();
		return $agent->isMobile();
	}
	*/

	public static function data_br($data,$retorno = "00/00/0000") {
		if($data) {
			if($data != "0000-00-00") {
				$data = explode("-",$data);
				return $data[2]."/".$data[1]."/".$data[0];
			} else {
				return $retorno;
			}
		} else {
			return $retorno;
		}
	}

	public static function calcularIdade($data){
		$idade = 0;
		$data_nascimento = date('Y-m-d', strtotime($data));
		   $data = explode("-",$data_nascimento);
		   $anoNasc    = $data[0];
		   $mesNasc    = $data[1];
		   $diaNasc    = $data[2];

		   $anoAtual   = date("Y");
		   $mesAtual   = date("m");
		   $diaAtual   = date("d");

		   $idade      = $anoAtual - $anoNasc;
		   if ($mesAtual < $mesNasc){
			   $idade -= 1;
		   } elseif ( ($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc) ){
			   $idade -= 1;
		   }

		   return $idade;
	}

	public static function data_mysql($data,$retorno = "0000-00-00") {
		if($data) {
			$data = explode("/",$data);
			return $data[2]."-".$data[1]."-".$data[0];
		} else {
			return $retorno;
		}
	}

	public static function datetime_br($data){

		$data = Carbon::parse($data)->format('Y-m-d');
		return Helper::data_br($data);

	}

	public static function calcula_idade($data_nascimento){
		return Carbon::parse($data_nascimento)->age;
	}

	public static function dataExtenso($data) {


		$data = explode("-",$data);
		$dia = $data[2];
		$mes = $data[1];
		$ano = $data[0];

		switch ($mes){

			case 1: $mes = "Janeiro"; break;
			case 2: $mes = "Fevereiro"; break;
			case 3: $mes = "Março"; break;
			case 4: $mes = "Abril"; break;
			case 5: $mes = "Maio"; break;
			case 6: $mes = "Junho"; break;
			case 7: $mes = "Julho"; break;
			case 8: $mes = "Agosto"; break;
			case 9: $mes = "Setembro"; break;
			case 10: $mes = "Outubro"; break;
			case 11: $mes = "Novembro"; break;
			case 12: $mes = "Dezembro"; break;

		}

		return $dia." de ".$mes." de ".$ano;

	}

    public static function ParteData($data, $tipo) {


		$dat = explode("-",$data);
		$dia = $dat[2];
		$mes = $dat[1];
		$ano = $dat[0];

		switch ($mes){

			case 1: $mes = "Janeiro"; break;
			case 2: $mes = "Fevereiro"; break;
			case 3: $mes = "Março"; break;
			case 4: $mes = "Abril"; break;
			case 5: $mes = "Maio"; break;
			case 6: $mes = "Junho"; break;
			case 7: $mes = "Julho"; break;
			case 8: $mes = "Agosto"; break;
			case 9: $mes = "Setembro"; break;
			case 10: $mes = "Outubro"; break;
			case 11: $mes = "Novembro"; break;
			case 12: $mes = "Dezembro"; break;

		}

        switch ($tipo){

			case 'dia': return $dia; break;
			case 'mes': return $mes; break;
            case 'ano': return $ano; break;
            case 'semana':
                return date('w', strtotime($data));
            break;
            case 'mesAno': return $ano.'-'.$dat[1]; break;

		}

	}


    public static function mesExtenso($mes) {

		switch ($mes){

			case 1: $mes = "Janeiro"; break;
			case 2: $mes = "Fevereiro"; break;
			case 3: $mes = "Março"; break;
			case 4: $mes = "Abril"; break;
			case 5: $mes = "Maio"; break;
			case 6: $mes = "Junho"; break;
			case 7: $mes = "Julho"; break;
			case 8: $mes = "Agosto"; break;
			case 9: $mes = "Setembro"; break;
			case 10: $mes = "Outubro"; break;
			case 11: $mes = "Novembro"; break;
			case 12: $mes = "Dezembro"; break;

		}

        return $mes;

	}

    public static function getCalendarioMes($contrato, $aluno, $data_inicial, $data_final){
        return CalendarioAluno::where('contrato_id', $contrato)->where('aluno_id', $aluno)->whereBetween('data', [$data_inicial, $data_final])->get();
    }

    public static function getAtualizacaoContrato($data_inicial, $data_final, $contrato, $tipo){

        $data_inicial = Carbon::parse($data_inicial)->subMonths(1);
        $data_final = Carbon::parse($data_final)->subMonths(1);

        $atualizacoes = AtualizacoesContrato::where('contrato_id',$contrato)->where('tipo', $tipo)->whereBetween('data', [$data_inicial, $data_final])->get();

        $contrato = Contrato::find($contrato);

        switch($tipo){

            case "Falta Trabalho":
                return $atualizacoes->count()*($contrato->valor_bolsa/Helper::getDiasEntreDatas($data_inicial, $data_final));
            break;

            case "Entrega de Uniforme":
                return $atualizacoes->sum('valor');
            break;

            case "Exame Admissional" || "Exame Demissional":
                return $atualizacoes->sum('valor');
            break;

            case "Qtde Falta Trabalho":
                return $atualizacoes->count();
            break;

            case "Benefícios":
                return $atualizacoes->count();
            break;
        }

    }

    public static function getDiasEntreDatas($data_inicial, $data_final){

        $diferenca = strtotime($data_final) - strtotime($data_inicial);
        $dias = floor($diferenca / (60 * 60 * 24))+1;
        return $dias;

    }

    public static function calcularDesconto(float $valor, float $p_desconto): float
    {
        $resultado = $valor - ($valor * $p_desconto / 100);
        return round($resultado, 2);
    }

    public static function calcularAcrescimo(float $valor, float $p_acrescimo): float
    {
        $resultado = $valor + ($valor * $p_acrescimo / 100);
        return round($resultado, 2);
    }

    public static function calcularPer100DeValor(float $valor, float $percentual): float
    {
        $resultado = ($valor * $percentual / 100);
        return round($resultado, 2);
    }

    public static function calculaDecimo($Faturamento){
        //calculo
        $tempo_contrato = Helper::getDiasEntreDatas($Faturamento->data_inicial, $Faturamento->data_final);

        switch ($tempo_contrato){
            case $tempo_contrato <= 14:
                $valor = 0;
                break;

            case $tempo_contrato > 14 && $tempo_contrato <= 44:
                $valor = $Faturamento->contrato->valor_bolsa/12;
                break;

            default:
                $valor = ($Faturamento->contrato->valor_bolsa/12)*2;
                break;
        }

        return $valor;

    }

    public static function calculaFerias($Faturamento){
        //calculo
        $tempo_contrato = Helper::getDiasEntreDatas($Faturamento->data_inicial, $Faturamento->data_final);

        switch ($tempo_contrato){
            case $tempo_contrato <= 14:
                $valor = 0;
                break;

            case $tempo_contrato > 14 && $tempo_contrato <= 44:
                $valor = $Faturamento->contrato->valor_bolsa/12;
                break;

            default:
                $valor = ($Faturamento->contrato->valor_bolsa/12)*2;
                break;

        }

        return $valor;
    }

    public static function getFaturamentoContrato($faturamento, $contrato){
        return FaturamentoContrato::where('contrato_id', $contrato)->where('faturamento_id', $faturamento)->whereNull('deleted_at')->first();
    }

    public static function getFaturamentoConvenio($convenio, $data_inicial, $data_final){
        return Faturamento::where('convenio_id', $convenio)->whereDate('data_inicial', $data_inicial)->whereDate('data_final', $data_final)->whereNull('deleted_at')->get();
    }

	public static function Phone($number){
		$number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);
		// primeiro substr pega apenas o DDD e coloca dentro do (), segundo subtr pega os números do 3º até faltar 4, insere o hifem, e o ultimo pega apenas o 4 ultimos digitos
		return $number;
	}

	public static function mask($valor, $mask)
	{
		$maskared = '';
		$val = Helper::limpa_campo($valor);
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++)
		{
		if($mask[$i] == '#')
		{
			if(isset($val[$k]))
			$maskared .= $val[$k++];
		}
		else
		{
			if(isset($mask[$i]))
			$maskared .= $mask[$i];
			}
		}
		return $maskared;
		/*
		$cnpj = "11222333000199";
		$cpf = "00100200300";
		$cep = "08665110";
		$data = "10102010";

		echo mask($cnpj,'##.###.###/####-##');
		echo mask($cpf,'###.###.###-##');
		echo mask($cep,'#####-###');
		echo mask($data,'##/##/####');
		*/
	}


    public static function url_amigavel($string) {
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z',
            'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
            'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
            'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
            'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
            'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
            'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
            'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
        );
        // Traduz os caracteres em $string, baseado no vetor $table
        $string = strtr($string, $table);
        // converte para minúsculo
        $string = strtolower($string);
        // remove caracteres indesejáveis (que não estão no padrão)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        // Remove múltiplas ocorrências de hífens ou espaços
        $string = preg_replace("/[\s-]+/", " ", $string);
        // Transforma espaços e underscores em hífens
        $string = preg_replace("/[\s_]/", "-", $string);
        // retorna a string
        return $string;
    }

    public static function GetTotalLeadsAnunciante($anunciante_id) {

        $leads = Leads::where('deleted_at','<>',null)->count();

        return $leads;

    }

    public static function GetInformacaoByChave($anuncio_id, $chave){

        $anuncioInformacao = AnuncioInformacoes::where('anuncio_id', $anuncio_id)->where('chave', $chave)->first();
        if($anuncioInformacao){
            return $anuncioInformacao->valor;
        }else{
            return false;
        }

    }

    public static function GetInformacoesByTipo($anuncio_id, $tipo){
        $anuncioInformacoes = AnuncioInformacoes::where('anuncio_id', $anuncio_id)->where('tipo', $tipo)->get();
        if($anuncioInformacoes){
            return $anuncioInformacoes;
        }else{
            return false;
        }

    }

    // function to get  the address
    public static function get_lat_long($address) {
        $array = array();
        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBLZYFMbNKXu2gyC_yxbdEDGxA6G0LSNu8&address='.urlencode($address).'&sensor=false');

        // We convert the JSON to an array
        $geo = json_decode($geo, true);

        // If everything is cool
        if ($geo['status'] = 'OK') {
        $latitude = $geo['results'][0]['geometry']['location']['lat'];
        $longitude = $geo['results'][0]['geometry']['location']['lng'];
        $array = array('lat'=> $latitude ,'lng'=>$longitude);
        }

        return $array;
    }



}

?>
