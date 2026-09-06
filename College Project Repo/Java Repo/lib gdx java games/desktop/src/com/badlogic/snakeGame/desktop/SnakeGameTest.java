package com.badlogic.snakeGame.desktop;


import com.badlogic.snakeGame.Snake;
import com.badlogic.snakeGame.SnakeGame;
import com.badlogic.gdx.backends.lwjgl3.Lwjgl3Application;
import com.badlogic.gdx.backends.lwjgl3.Lwjgl3ApplicationConfiguration;


// Please note that on macOS your application needs to be started with the -XstartOnFirstThread JVM argument
public class SnakeGameTest {
	public static void main (String[] arg) {
		Lwjgl3ApplicationConfiguration config = new Lwjgl3ApplicationConfiguration();
		config.setForegroundFPS(60);
		config.setTitle("Snake");
		 config.setWindowedMode(800, 480);
	      config.useVsync(true);
		new Lwjgl3Application(new Snake(), config);
		
	}
}

