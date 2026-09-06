package com.badlogic.snakeGame;
import java.util.Iterator;

import com.badlogic.gdx.ApplicationAdapter;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.audio.Music;
import com.badlogic.gdx.audio.Sound;
import com.badlogic.gdx.graphics.OrthographicCamera;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.math.MathUtils;
import com.badlogic.gdx.math.Rectangle;
import com.badlogic.gdx.math.Vector3;
import com.badlogic.gdx.utils.Array;
import com.badlogic.gdx.utils.ScreenUtils;
import com.badlogic.gdx.utils.TimeUtils;

public class SnakeGame extends ApplicationAdapter {
	
	   private Texture MapImage;
	   private Texture SnakeHd;
	   private Texture SnakeBd;
	   private Texture SnakeT;
	   private Texture AppleImage;
	   private Sound eatSound;
	   private Music forestMusic;
	   private OrthographicCamera camera;
	   private SpriteBatch batch;
	   private Rectangle Snake;
	//   private Rectangle SnakeB;
	 //  private Array<Rectangle> SnakeBody;
	//   private Rectangle SnakeC;
	   private Array<Rectangle> Apples;
	   private long lastDropTime;
	   int BodyCount = 1;
	   
@Override
public void create() {
   
   MapImage = new Texture(Gdx.files.internal("snkmap.png"));
   AppleImage = new Texture(Gdx.files.internal("cattest.png"));
   SnakeHd = new Texture(Gdx.files.internal("snakehead2.png"));
   SnakeBd = new Texture(Gdx.files.internal("snakeBody.png"));
   SnakeT = new Texture(Gdx.files.internal("SnakeTail.png"));


   eatSound = Gdx.audio.newSound(Gdx.files.internal("eatApple.mp3"));
   forestMusic = Gdx.audio.newMusic(Gdx.files.internal("frstAmb.mp3"));

  
   forestMusic.setLooping(true);
   forestMusic.play();

 
   camera = new OrthographicCamera();
   camera.setToOrtho(false, 800, 480);
   batch = new SpriteBatch();
   Snake = new Rectangle();
   Snake.x = 800 / 2 - 64 / 2;
   Snake.y = 200;
   Snake.width = 64;
   Snake.height = 64;


	  
	 /* SnakeB = new Rectangle();
	   SnakeB.x = Snake.x;
	   SnakeB.y = Snake.y-64;
	   SnakeB.width = 64;
	   SnakeB.height = 64;*/
	  
	   
   
    /* SnakeC = new Rectangle();
   SnakeC.x = Snake.x;
   SnakeC.y = Snake.y-(64);
   SnakeC.width = 64;
   SnakeC.height = 64;
   Apples = new Array<Rectangle>();*/
   spawnApples();
  
}
@Override
public void render() {
   ScreenUtils.clear(0, 0, 0.2f, 1);
   camera.update();
   batch.setProjectionMatrix(camera.combined);
   batch.begin();
   batch.draw(MapImage,780,460);
   batch.draw(SnakeHd, Snake.x, Snake.y);
  // batch.draw(SnakeBd, SnakeB.x, SnakeB.y);
  // batch.draw(SnakeT, SnakeC.x, SnakeC.y);
   batch.end();
   if(Gdx.input.isTouched()) {
       Vector3 touchPos = new Vector3();
       touchPos.set(Gdx.input.getX(), Gdx.input.getY(), 0);
       camera.unproject(touchPos);
       Snake.x = touchPos.x - 64 / 2;
       Snake.y = touchPos.y - 64 / 2;
    }

   if(Gdx.input.isKeyPressed(Input.Keys.LEFT)) Snake.x -= 200 * Gdx.graphics.getDeltaTime();
   if(Gdx.input.isKeyPressed(Input.Keys.RIGHT)) Snake.x += 200 * Gdx.graphics.getDeltaTime();
   if(Gdx.input.isKeyPressed(Input.Keys.UP)) Snake.y += 200 * Gdx.graphics.getDeltaTime();
   if(Gdx.input.isKeyPressed(Input.Keys.DOWN)) Snake.y -= 200 * Gdx.graphics.getDeltaTime();
   if(Snake.x < 0) Snake.x = 0;
   if(Snake.x > 800 - 64) Snake.x = 800 - 64;
   if (Snake.y < 0)Snake.y = 0;
	if (Snake.y > 480 - 64)Snake.y = 480 - 64;
   if(TimeUtils.millis() - lastDropTime > 3000) spawnApples();
   for (Iterator<Rectangle> iter = Apples.iterator(); iter.hasNext(); ) {
       Rectangle raindrop = iter.next();
       raindrop.y -= 300 * Gdx.graphics.getDeltaTime();
       if(raindrop.y + 64 < 0) iter.remove();
       if(raindrop.overlaps(Snake)) {
           eatSound.play();
           iter.remove();
        }
    }
   batch.begin();
  
   			batch.draw(SnakeHd, Snake.x, Snake.y);

   			/*batch.draw(SnakeBd, SnakeB.x, SnakeB.y);
	   
   			batch.draw(SnakeT, SnakeC.x, SnakeC.y);*/
   for(Rectangle Apple: Apples) {
      batch.draw(AppleImage, Apple.x, Apple.y);
   }
   batch.end();
   
}
private void spawnApples() {
	      Rectangle Apple = new Rectangle();
	      Apple.x = MathUtils.random(0, 800-64);
	      Apple.y = MathUtils.random(0, 400-64);
	      Apple.width = 64;
	      Apple.height = 64;
	      Apples.add(Apple);
	      lastDropTime = TimeUtils.millis();     
	   }

/*private void snakeEats() {
	
	Rectangle SnakeB1= new Rectangle();
		SnakeB1.x = SnakeB.x;
	   SnakeB1.y = SnakeB.y-64*BodyCount;
	   SnakeB1.width = 64;
	   SnakeB1.height = 64;
	   SnakeBody.add(SnakeB1);
	
}
*/

@Override
public void dispose() {
	MapImage.dispose();
   SnakeHd.dispose();
   SnakeBd.dispose();
   SnakeT.dispose();
   AppleImage.dispose();
   eatSound.dispose();
   forestMusic.dispose();
   batch.dispose();
}

}