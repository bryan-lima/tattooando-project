package com.tattooando.project.Studio;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;

import com.tattooando.project.R;

public class ServicoListaActivity extends AppCompatActivity {

    private Context context = ServicoListaActivity.this;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stu_servico_lista);

        configurarNavBar();
    }

    private void configurarNavBar() {
        setTitle("Seus Serviços");
        ActionBar actionBar = getSupportActionBar(); // Instancia objeto da BAR
        actionBar.setDisplayHomeAsUpEnabled(true); // Exibe o ícone
        actionBar.setHomeButtonEnabled(true); // Habilita o click
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) { // Botão adicional na ToolBar
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
}
