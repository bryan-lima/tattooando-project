package com.tattooando.project.Studio;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

import com.tattooando.project.R;

public class ServicoAdicionaActivity extends AppCompatActivity {

    private Context context = ServicoAdicionaActivity.this;
    private Button btnAdicionar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stu_servico_adiciona);

        configurarNavBar();
        inicializarComponentes();
        eventosClick();
    }

    private void configurarNavBar() {
        setTitle("Adicionar Serviço");
        ActionBar actionBar = getSupportActionBar(); // Instancia objeto da BAR
        actionBar.setDisplayHomeAsUpEnabled(true); // Exibe o ícone
        actionBar.setHomeButtonEnabled(true); // Habilita o click
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) { //Botão adicional na ToolBar
        switch (item.getItemId()) {
            case android.R.id.home:
                Intent intent = new Intent(context, HomeStudioActivity.class);
                startActivity(intent);
                finish();
                break;
            default:
                break;
        }
        return true;
    }

    @Override
    public void onBackPressed() {
        Intent intent = new Intent(context, HomeStudioActivity.class);
        startActivity(intent);
        super.onBackPressed();
        finish();
    }

    private void inicializarComponentes() {
        btnAdicionar = findViewById(R.id.stu_ser_add_btn_adicionar);
    }

    private void eventosClick() {
        btnAdicionar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, HomeStudioActivity.class);
                startActivity(intent);
                finish();
            }
        });
    }
}
