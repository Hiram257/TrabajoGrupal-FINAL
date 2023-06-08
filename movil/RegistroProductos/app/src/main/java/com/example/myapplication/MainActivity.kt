package com.example.myapplication
    import java.io.FileOutputStream
import android.content.Intent
import android.net.Uri
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.provider.MediaStore
import android.view.View
import android.widget.*
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

        private val PICK_IMAGE_REQUEST = 1

        private lateinit var btnSelectImage: Button
        private lateinit var imageView: ImageView
        override fun onCreate(savedInstanceState: Bundle?) {
            super.onCreate(savedInstanceState)
            setContentView(R.layout.activity_main)
            val volver =findViewById<Button>(R.id.volver)

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

            btnSelectImage = findViewById(R.id.btnSelectImage)
            imageView = findViewById(R.id.imageView)

            btnSelectImage.setOnClickListener {
                val intent = Intent(Intent.ACTION_PICK, MediaStore.Images.Media.EXTERNAL_CONTENT_URI)
                startActivityForResult(intent, PICK_IMAGE_REQUEST)
            }
            volver.setOnClickListener {
                volver1();
            }
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
        override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
            super.onActivityResult(requestCode, resultCode, data)

            if (requestCode == PICK_IMAGE_REQUEST && resultCode == RESULT_OK && data != null) {
                val selectedImageUri = data.data
                imageView.setImageURI(selectedImageUri)

                // Guardar la imagen en una carpeta específica
                val imageFilePath = "/ruta/hacia/la/carpeta/destino/nombre_imagen.jpg"
                val outputStream = contentResolver.openOutputStream(Uri.parse(imageFilePath))
                val inputStream = selectedImageUri?.let { contentResolver.openInputStream(it) }
                outputStream?.let { inputStream?.copyTo(it) }
                outputStream?.close()
                inputStream?.close()
            }

        }
        fun volver1(){
            val volver = Intent(this,Inicio::class.java)
            startActivity(volver)
        }
        }


