package com.tattooando.project.Cliente;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

import com.tattooando.project.R;

public class SobreClienteActivity extends AppCompatActivity {

    private Context context = SobreClienteActivity.this;
    private Button btnVoltar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cli_sobre);

        configurarNavBar();
        inicializarComponentes();
        eventosClick();
    }

    private void configurarNavBar() {
        setTitle("Sobre");
        ActionBar actionBar = getSupportActionBar(); // Instancia objeto da BAR
        actionBar.setDisplayHomeAsUpEnabled(true); // Exibe o ícone
        actionBar.setHomeButtonEnabled(true); // Habilita o click
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) { // Botão adicional na ToolBar
        switch (item.getItemId()) {
            case android.R.id.home:
                Intent intent = new Intent(context, HomeClienteActivity.class);
                startActivity(intent);
                finish();
                break;
            default:
                break;
        }
        return true;
    }

    private void inicializarComponentes() {
        btnVoltar = findViewById(R.id.cli_sob_btn_voltar);
    }

    private void eventosClick() {
        btnVoltar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, HomeClienteActivity.class);
                startActivity(intent);
                finish();
            }
        });
    }
}
