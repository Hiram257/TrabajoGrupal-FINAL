package com.example.myapplication

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.widget.TableLayout
import android.widget.TextView
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.Volley
import org.json.JSONException

class MainActivity2 : AppCompatActivity() {
    var tbUsuarios: TableLayout?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main2)
        tbUsuarios=findViewById(R.id.usuario22)

        cargaTabla()
    }
    fun cargaTabla(){
        tbUsuarios?.removeAllViews()
        var queue= Volley.newRequestQueue(this)
        var url="http://192.168.0.107/tienda_computo/TrabajoGrupal-FINAL/API/registros.php"

        var jsonObjectRequest= JsonObjectRequest(Request.Method.GET,url,null,
            Response.Listener { response ->
                try {
                    var jsonArray=response.getJSONArray("data")
                    for(i in 0 until jsonArray.length() ){
                        var jsonObject=jsonArray.getJSONObject(i)
                        val registro=
                            LayoutInflater.from(this).inflate(R.layout.registroproducto,null,false)
                        val colNombre=registro.findViewById<View>(R.id.colNombre) as TextView
                        val colEmail=registro.findViewById<View>(R.id.colEmail) as TextView
                        colNombre.text=jsonObject.getString("descripcion")
                        colEmail.text=jsonObject.getString("precio")

                        tbUsuarios?.addView(registro)
                    }
                }catch (e: JSONException){
                    e.printStackTrace()
                }
            }, Response.ErrorListener { error ->

            }
        )
        queue.add(jsonObjectRequest)
    }



}


