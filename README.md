# Raspberry-Pi-Status-Indicator

> 树莓派运行状态监视器



**你是否在使用树莓派的过程中遇到过以下烦恼?**

- 人在外面，树莓派死机了却不知道
- 因为断网，脚本未能执行成功，浪费了大量的时间

那么你值得使用Raspberry-Pi-Status-Indicator！



## 使用方法

1. 部署该仓库到你的Web服务器（必须支持PHP）
2. 给予该目录写入权限
3. 在树莓派的crontab内添加一条

```bash
*  *  *  *  * root curl http://example.com/index.php?action=update
```

4. 等待树莓派触发该网页，即可监视树莓派的运行状态！



## 界面截图

![https://github.com/LuRenJiasWorld/Raspberry-Pi-Status-Indicator/raw/master/snapshot.png](https://github.com/LuRenJiasWorld/Raspberry-Pi-Status-Indicator/raw/master/snapshot.png)