package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button

class Inicio : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {

        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_inicio)
        val btn = findViewById<Button>(R.id.registro)
        val btn2=findViewById<Button>(R.id.producto2)

        btn.setOnClickListener {

            driner();
        }
        btn2.setOnClickListener {

            producto()
        }



        }
    fun driner(){
        val intent = Intent(this, MainActivity::class.java)
        startActivity(intent)
    }
    fun  producto(){
        val producto1 = Intent(this,MainActivity2::class.java)
        startActivity(producto1)
    }
}