package com.tattooando.project.Studio;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.app.TimePickerDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TimePicker;

import com.tattooando.project.R;

import java.util.Calendar;

public class HorarioFuncActivity extends AppCompatActivity {

    private Context context = HorarioFuncActivity.this;
    private EditText edtHorSemInicio, edtHorSemFim, edtHorFdsInicio, edtHorFdsFim;
    private CheckBox chkFdsFechado;
    private Button btnAtualizar;

    private Calendar calendar;
    private int hora, minuto;
    String amPm;
    private TimePickerDialog tpdHorarioSemanaInicio, tpdHorarioSemanaFim, tpdHorarioFdsInicio, tpdHorarioFdsFim;

    private LinearLayout linHorFdsFeriados;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stu_horario_func);

        configurarNavBar();
        inicializarComponentes();
        eventosClick();

        linHorFdsFeriados.setVisibility(View.GONE);
    }

    private void configurarNavBar() {
        setTitle("Horário de Funcionamento");
        ActionBar actionBar = getSupportActionBar();
        actionBar.setDisplayHomeAsUpEnabled(true);
        actionBar.setHomeButtonEnabled(true);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
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
        edtHorSemInicio = findViewById(R.id.stu_upd_hor_fun_txt_semana_inicio);
        edtHorSemFim = findViewById(R.id.stu_upd_hor_fun_txt_semana_fim);
        edtHorFdsInicio = findViewById(R.id.stu_upd_hor_fun_txt_fds_feriados_inicio);
        edtHorFdsFim = findViewById(R.id.stu_upd_hor_fun_txt_fds_feriados_fim);

        chkFdsFechado = findViewById(R.id.stu_upd_hor_fun_chk_fds_feriados_fechado);
        linHorFdsFeriados = findViewById(R.id.stu_upd_hor_fun_lin_fds_feriados);

        btnAtualizar = findViewById(R.id.stu_upd_hor_fun_btn_atualizar);
    }

    private void eventosClick() {
        btnAtualizar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, HomeStudioActivity.class);
                startActivity(intent);
                finish();
            }
        });

        edtHorSemInicio.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                horarioAtual();
                TimePickerDialog timePickerDialog = new TimePickerDialog(context, new TimePickerDialog.OnTimeSetListener() {
                    @Override
                    public void onTimeSet(TimePicker timePicker, int hourOfDay, int minutes) {
                        String strHora = "";
                        String strMinutes = "";
                        strHora = intTimeToStr(hourOfDay);
                        strMinutes = intTimeToStr(minutes);
                        String strTempo = strHora+":"+strMinutes;

                        edtHorSemInicio.setText(strTempo);
                    }
                }, hora, minuto, true);
                timePickerDialog.show();
            }
        });

        edtHorSemFim.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                horarioAtual();
                TimePickerDialog timePickerDialog = new TimePickerDialog(context, new TimePickerDialog.OnTimeSetListener() {
                    @Override
                    public void onTimeSet(TimePicker timePicker, int hourOfDay, int minutes) {
                        String strHora = "";
                        String strMinutes = "";
                        strHora = intTimeToStr(hourOfDay);
                        strMinutes = intTimeToStr(minutes);
                        String strTempo = strHora+":"+strMinutes;
                        edtHorSemFim.setText(strTempo);
                    }
                }, hora, minuto, true);
                timePickerDialog.show();
            }
        });

        edtHorFdsInicio.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                horarioAtual();
                TimePickerDialog timePickerDialog = new TimePickerDialog(context, new TimePickerDialog.OnTimeSetListener() {
                    @Override
                    public void onTimeSet(TimePicker timePicker, int hourOfDay, int minutes) {
                        String strHora = "";
                        String strMinutes = "";
                        strHora = intTimeToStr(hourOfDay);
                        strMinutes = intTimeToStr(minutes);
                        String strTempo = strHora+":"+strMinutes;
                        edtHorFdsInicio.setText(strTempo);
                    }
                }, hora, minuto, true);
                timePickerDialog.show();
            }
        });

        edtHorFdsFim.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                horarioAtual();
                TimePickerDialog timePickerDialog = new TimePickerDialog(context, new TimePickerDialog.OnTimeSetListener() {
                    @Override
                    public void onTimeSet(TimePicker timePicker, int hourOfDay, int minutes) {
                        String strHora = "";
                        String strMinutes = "";
                        strHora = intTimeToStr(hourOfDay);
                        strMinutes = intTimeToStr(minutes);
                        String strTempo = strHora+":"+strMinutes;
                        edtHorFdsFim.setText(strTempo);
                    }
                }, hora, minuto, true);
                timePickerDialog.show();
            }
        });

        chkFdsFechado.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener() {
            @Override
            public void onCheckedChanged(CompoundButton compoundButton, boolean isChecked) {
                if(compoundButton.isChecked()){
                    linHorFdsFeriados.setVisibility(View.GONE);
                } else {
                    linHorFdsFeriados.setVisibility(View.VISIBLE);
                }
            }
        });
    }

    private String intTimeToStr(int intTime) {
        String strTime;
        if(intTime >= 0 && intTime < 10){
            strTime = "0"+intTime;
        }else{
            strTime = String.valueOf(intTime);
        }
        return strTime;
    }

    public void horarioAtual() {
        calendar = Calendar.getInstance();
        hora = calendar.get(Calendar.HOUR_OF_DAY);
        minuto = calendar.get(Calendar.MINUTE);
    }
}
