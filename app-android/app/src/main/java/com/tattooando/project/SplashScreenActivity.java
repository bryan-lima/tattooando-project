package com.tattooando.project;

import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.content.Context;
import android.content.Intent;
import android.os.Handler;

public class SplashScreenActivity extends AppCompatActivity {

    Context context = SplashScreenActivity.this;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash_screen);

        Handler handle = new Handler();
        handle.postDelayed(new Runnable() {
            @Override
            public void run() {
                chamarLogin();
            }
        }, 2000);
    }

    private void chamarLogin() {
        Intent intent = new Intent(context, TipoLoginActivity.class);
        startActivity(intent);
        finish();
    }
}
