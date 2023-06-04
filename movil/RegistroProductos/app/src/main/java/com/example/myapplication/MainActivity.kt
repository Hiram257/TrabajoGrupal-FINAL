    package com.example.myapplication

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.RequestQueue
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley

    class MainActivity : AppCompatActivity() {
        var descripcion: EditText? = null
        var precio: EditText? = null
        var stock: EditText? = null
        var codigo_producto: EditText? = null
        var id_marca: EditText? = null
        var id_familia: EditText? = null
        var nombre: EditText? = null
        var id_ubicacion: EditText? = null
        var estado_producto: EditText? = null
        var id_proveedor: EditText? = null
        var imagenes: EditText? = null


        override fun onCreate(savedInstanceState: Bundle?) {
            super.onCreate(savedInstanceState)
            setContentView(R.layout.activity_main)
            descripcion = findViewById(R.id.discripcion)
            precio = findViewById(R.id.precio)
            stock = findViewById(R.id.stock)
            codigo_producto = findViewById(R.id.codigo_producto)
            id_marca = findViewById(R.id.id_marca)
            id_familia = findViewById(R.id.id_familia)
            nombre = findViewById(R.id.nombre)
            id_ubicacion = findViewById(R.id.id_ubicacion)
            estado_producto = findViewById(R.id.estado_producto)
            id_proveedor = findViewById(R.id.id_provedor)
            imagenes = findViewById(R.id.imagen)

        }
                fun clickBtnInsertar(view:View){
                val url = "http://192.168.0.107/tienda_computo/TrabajoGrupal-FINAL/API/insertar.php"
                val queue=Volley.newRequestQueue(this)
                var resultadoPost = object : StringRequest(Request.Method.POST, url,
                    Response.Listener<String> { response ->
                        Toast.makeText(this, "ususaerio", Toast.LENGTH_LONG).show()
                    },Response.ErrorListener { error ->
                        Toast.makeText(this, "$error", Toast.LENGTH_LONG).show()
                    }){
                    override fun getParams(): MutableMap<String, String> {
                        val parametros=HashMap<String, String>()
                        parametros.put("descripcion", descripcion?.text.toString())
                        parametros.put("precio", precio?.text.toString())
                        parametros.put("stock", stock?.text.toString())
                        parametros.put("codigo_producto", codigo_producto?.text.toString())
                        parametros.put("id_marca", id_marca?.text.toString())
                        parametros.put("id_familia", id_familia?.text.toString())
                        parametros.put("nombre", nombre?.text.toString())
                        parametros.put("id_ubicacion", id_ubicacion?.text.toString())
                        parametros.put("estado_producto", estado_producto?.text.toString())
                        parametros.put("id_proveedor", id_proveedor?.text.toString())
                        parametros.put("imagen", imagenes?.text.toString())
                        return parametros


                    }
                }
                queue.add(resultadoPost)
            }
        }


