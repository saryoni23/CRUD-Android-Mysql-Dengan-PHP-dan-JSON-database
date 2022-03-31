/*
 * By 		: Jhohannes H Purba
 * URL 		: jho.batagrams.com
 * email 	: jhohannespurba@gmail.com
 * facebook	: facebook.com/jhohannespurba
 * twitter 	: twitter.com/jhohannespurba
 * */

package jhohannes.purba;

public class Biodata extends Koneksi {
	String URL = "http://10.0.2.2/tips_crud_android_json_mysql/server.php";
	String url = "";
	String response = "";

	public String tampilBiodata() {
		try {
			url = URL + "?operasi=view";
			System.out.println("URL Tampil Biodata: " + url);
			response = call(url);
		} catch (Exception e) {
		}
		return response;
	}

	public String inserBiodata(String nama, String alamat) {
		try {
			url = URL + "?operasi=insert&nama=" + nama + "&alamat=" + alamat;
			System.out.println("URL Insert Biodata : " + url);
			response = call(url);
		} catch (Exception e) {
		}
		return response;
	}

	public String getBiodataById(int id) {
		try {
			url = URL + "?operasi=get_biodata_by_id&id=" + id;
			System.out.println("URL Insert Biodata : " + url);
			response = call(url);
		} catch (Exception e) {
		}
		return response;
	}

	public String updateBiodata(String id, String nama, String alamat) {
		try {
			url = URL + "?operasi=update&id=" + id + "&nama=" + nama + "&alamat=" + alamat;
			System.out.println("URL Insert Biodata : " + url);
			response = call(url);
		} catch (Exception e) {
		}
		return response;
	}

	public String deleteBiodata(int id) {
		try {
			url = URL + "?operasi=delete&id=" + id;
			System.out.println("URL Insert Biodata : " + url);
			response = call(url);
		} catch (Exception e) {
		}
		return response;
	}

}
