<?php 
class Togel extends CI_Controller {
	public function index() {
		// $sgp4d = read_file('live_4d.php');
		// $ssgp4d = preg_replace('/[\[\]"]/', '', $sgp4d);
		$data['head'] = $this->get_head();
		$data['header'] = $this->get_header();
		$data['base_url'] = base_url();
		$data['footer'] = $this->get_footer();
		$data['country-live'] = base_url("assets/js/sgp-live.js");
		$this->parser->parse('togel', $data);
		// $this->load->view('togel', $data);
		// base_url("assets/css/bootstrap.css");base_url("assets/js/jQuery-1.10.2.js");
		// echo "This is default function."; 
	}
	public function hasil() {
		$country = $this->uri->segment(1);
		$data['head'] = $this->get_head();
		$data['header'] = $this->get_header();
		$data['footer'] = $this->get_footer();
		$data['country-live'] = base_url("assets/js/".$country."-live.js");
		$this->parser->parse($country, $data);
	}
	public function get_lengkap() {
		$country = $this->uri->segment(1);
		$data['head'] = $this->get_head();
		$data['header'] = $this->get_header();
		$data['base_url'] = base_url();
		$data['footer'] = $this->get_footer();
		$this->load->model('togel_model');
		$hasil_lengkap = $this->togel_model->get_lengkap($country)->result();
		foreach($hasil_lengkap as $k => $hl){
			$hasillengkap[$k]['tanggal'] = date('j F Y', strtotime($hl->tanggal));
			$hasillengkap[$k]['hari'] = date('l', strtotime($hl->tanggal));
			$hasillengkap[$k]['nomor'] = $hl->nomor;
		}
		$data['hasil_lengkap'] = $hasillengkap;
		$this->parser->parse('hasil_lengkap', $data); 
	}
	public function get_footer(){
		$footer_data = array(
			'base_url' => base_url()
		);
		return $this->parser->parse('partial/footer', $footer_data, true);
	}
	public function get_head(){
		$head_data = array(
			'title' => 'Hasil Togel Hari Ini Live',
			'meta_description' => 'hasil togel hari ini live result toto hari ini nomor togel tepat jitu',
			'meta_keyword' => 'hasil togel, hasil toto, togel toto, togel hari ini, toto ini hari, nomor togel jitu, no togel tepat',
			'bootstrap_css' => base_url("assets/css/bootstrap.css"),
			'bootstrap_mincss' => base_url("assets/css/bootstrap.min.css"),
			'mycss' => base_url("assets/css/mystyle.css"),
			'lumia_style' => base_url("assets/css/lumia-style.css"),
			'responsive_css' => base_url("assets/css/responsive.css"),
			'font_awesome' => base_url("assets/css/font-awesome.css"),
			'jquery' => base_url("assets/js/jquery-3.1.1.js"),
			'bootstrap_js' => base_url("assets/js/bootstrap.js"),
			'jquery_scrolltofixed' => base_url("assets/js/jquery-scrolltofixed.js")
		);
		return $this->parser->parse('partial/head', $head_data, true);
	}
	public function get_header(){
		$header_data = array(
			'base_url' => base_url(),
			'sgp_lengkap_link' => base_url("sgp/hasil-lengkap"),
			'sgp_lengkap' => 'Hasil Lengkap SGP',
			'macau45toto_link' => base_url("macau45toto"),
			'macau45toto' => 'Macau45Toto',
		);
		return $this->parser->parse('partial/header', $header_data, true);
	}
	public function getlive(){
		$country = $this->uri->segment(1);
		$live_sgp4d = 'Singapore 4D';
		require_once(APPPATH.'libraries/simple_html_dom.php'); 
		$simple_html_dom = new simple_html_dom();
		$simple_html_dom->load_file('http://putartogel.com/live_4d.php');
		$src_sgp4d = $simple_html_dom->plaintext;
		$live_sgp4d .= strstr(preg_replace('/[\[\]\"]/', '', $src_sgp4d), ',');
		write_file(FCPATH.'live_4d.php', $live_sgp4d);
		
		$live_sgptoto = 'Singapore TOTO';
		$simple_html_dom->load_file('http://putartogel.com/live_toto.php');
		$src_sgptoto = $simple_html_dom->plaintext;
		$live_sgptoto .= strstr(preg_replace('/[\[\]\"]/', '', $src_sgptoto), ',');
		write_file(FCPATH.'live_toto.php', $live_sgptoto);
	}
	public function getmacau45totolive(){
		$live_macau45toto4d = 'Macau Lucky 4D';
		require_once(APPPATH.'libraries/simple_html_dom.php'); 
		$simple_html_dom = new simple_html_dom();
		$simple_html_dom->load_file('http://macau45balls.net/resultLUCKY.php');
		$src_sgp4d = $simple_html_dom->plaintext;
		$live_macau45toto4d .= strstr(preg_replace('/[\[\]\"]/', '', $src_sgp4d), ',');
		write_file(FCPATH.'macau45toto_4d.php', $live_macau45toto4d);
		
		$live_macau45toto = 'Macau 45 TOTO';
		$simple_html_dom->load_file('http://macau45balls.net/resultTOTO.php');
		$src_sgptoto = $simple_html_dom->plaintext;
		$live_macau45toto .= strstr(preg_replace('/[\[\]\"]/', '', $src_sgptoto), ',');
		write_file(FCPATH.'macau45toto_toto.php', $live_macau45toto);
	}
} 
?>