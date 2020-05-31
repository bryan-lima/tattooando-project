package com.tattooando.project;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.tattooando.project.Cliente.LoginClienteActivity;
import com.tattooando.project.Studio.LoginStudioActivity;

public class TipoLoginActivity extends AppCompatActivity {

    private Button btnCliente;
    private Button btnStudio;
    private Context context = TipoLoginActivity.this;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tipo_login);

        configurarNavBar();
        inicializarComponentes();
        eventosClick();
    }

    private void configurarNavBar() {
        setTitle("Escolha o login");
    }

    private void inicializarComponentes() {
        btnCliente = findViewById(R.id.tip_log_btn_cliente);
        btnStudio = findViewById(R.id.tip_log_btn_studio);
    }

    private void eventosClick() {
        btnCliente.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, LoginClienteActivity.class);
                startActivity(intent);
            }
        });

        btnStudio.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, LoginStudioActivity.class);
                startActivity(intent);
            }
        });
    }

    @Override
    public void onBackPressed() {
        alertDialogOnBackPressed("Sair?", "Deseja sair do app?");
    }

    private void alertDialogOnBackPressed(String strTitle, String strMsg) {
        new AlertDialog.Builder(context, R.style.Theme_AppCompat_Dialog_Alert)
                .setTitle(strTitle)
                .setMessage(strMsg)
                .setNegativeButton("Não", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        // m.alertToast(context, "Nenhuma ação foi realizada.");
                    }
                })
                .setPositiveButton("Sim", new DialogInterface.OnClickListener() {
                    @RequiresApi(api = Build.VERSION_CODES.JELLY_BEAN)
                    @Override
                    public void onClick(DialogInterface dialogInterface, int i) {
                        finishAffinity();
                    }
                }).show();
    }
}
